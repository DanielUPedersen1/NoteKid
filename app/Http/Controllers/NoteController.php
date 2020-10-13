<?php

namespace App\Http\Controllers;

use App\Note;
use App\Tag;
use App\Category;

use Illuminate\Http\Request;
use Validator;

class NoteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $response = array();
    $notes = auth()->user()->notes()->with('category', 'tags')->get();
    return $notes;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validationErrors = $this->validateNote($request);
    if ($validationErrors) {
      return $validationErrors;
    }

    $user = auth()->user();
    $categories = $user->categories();
    $tags = $user->tags();

    $data = $this->processCategoriesAndTags($request, $user, $categories, $tags);
    $created = Note::create([
      'title' => $request->title,
      'category_id' => $data['category'],
      'content' => $request->content,
    ]);

    $created->tags()->attach($data['tags'], array('user_id' => $user->id));
    return $created;
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Note  $note
   * @return \Illuminate\Http\Response
   */
  public function show(Note $note)
  {
    if ($note) {
      $note->tags = $note->tags()->get();
      $note->category = $note->category()->get();

      return $note;
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Note  $note
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Note $note)
  {
    $validationErrors = $this->validateNote($request);
    if ($validationErrors) {
      return $validationErrors;
    }

    $user = auth()->user();
    $categories = $user->categories();
    $tags = $user->tags();

    $data = $this->processCategoriesAndTags($request, $user, $categories, $tags);

    // let's ensure that only new tags get attached
    $noteTags = $note->tags()->get(['id'])->pluck('id')->toArray();
    $requestTags = $data['tags'];

    $attachableTags = array();
    $detachableTags = array();
    foreach ($noteTags as $key => $tagId) {
      if (!in_array($tagId, $requestTags)) {
        $detachableTags[] = $tagId;
      }
    }

    foreach ($requestTags as $key => $tagId) {
      if (!in_array($tagId, $noteTags)) {
        $attachableTags[] = $tagId;
      }
    }

    $note->update([
      'title' => $request->title,
      'category_id' => $data['category'],
      'content' => $request->content,
    ]);

    $note->tags()->detach($detachableTags);
    $note->tags()->attach($attachableTags, array('user_id' => $user->id));
    return $note;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Note  $note
   * @return \Illuminate\Http\Response
   */
  public function destroy(Note $note)
  {
    $tagsObject = $note->tags();
    $tagIds = $tagsObject->get(['id'])->pluck(['id'])->toArray();
    $tagsObject->detach($tagIds);
    $deleted = $note->delete();
    if ($deleted) {
      return array('status' => 'ok');
    }
  }

  public function validateNote($request) {
    $rules = [
        'title' => 'required|string',
        'category' => 'required|string', // category_name
        'tags' => 'required|string', // tag names separated by comma
        'content' => 'required',
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
        $messages = $validator->messages();
        $errors = $messages->all();

        return apiResponse($errors, 'error', 'Request validation failed');
      }
   }

   public function processCategoriesAndTags($request, $user, $categories, $tags) {
    $categoriesRaw = $categories->get(['id', 'name'])->toArray();
    $tagsListRaw = $tags->get(['id', 'name'])->toArray();

    $categoriesList = array();
    foreach ($categoriesRaw as $key => $item) {
      $categoriesList[$item['id']] = $item['name'];
    }

    $tagsList = array();
    foreach ($tagsListRaw as $key => $item) {
      $tagsList[$item['id']] = $item['name'];
    }

    if (!in_array($request->category, $categoriesList)) {
      $createdCategory = $categories->create(['name' => $request->category]);
      $category = $createdCategory->id;
    } else {
      $category = array_search($request->category, $categoriesList);
    }

    $formTags = explode(',', $request->tags);
    $tagIds = array();
    foreach ($formTags as $key => $value) {
      if (!in_array($value, $tagsList)) {
        $createdTag = $tags->create(['name' => $value]);
        $tagId = $createdTag->id;
      } else {
        $tagId = array_search($value, $tagsList);
      }

      $tagIds[] = $tagId;
    }

    return array('category' => $category, 'tags' => $tagIds);
   }
}
