<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return auth()->user()->tags()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validationErrors = $this->validateTag($request);
      if ($validationErrors) {
        return $validationErrors;
      }

      $created = Tag::create([
        'user_id' => auth()->user()->id,
        'name' => $request->name
      ]);

      return $created;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
      return $tag;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
      $validationErrors = $this->validateTag($request);
      if ($validationErrors) {
        return $validationErrors;
      }

      $tag->update(['name' => $request->name]);
      return $tag;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }

    public function validateTag($request) {
      $rules = [
        'name' => 'required|string'
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
        $messages = $validator->messages();
        $errors = $messages->all();

        return apiResponse($errors, 'error', 'Request validation failed');
      }
    }
  }
