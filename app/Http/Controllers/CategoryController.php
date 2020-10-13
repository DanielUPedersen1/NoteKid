<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return auth()->user()->categories()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validationErrors = $this->validateCategory($request);
      if ($validationErrors) {
        return $validationErrors;
      }

      $created = Category::create([
        'user_id' => auth()->user()->id,
        'name' => $request->name
      ]);

      return $created;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
      return $category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
      $validationErrors = $this->validateCategory($request);
      if ($validationErrors) {
        return $validationErrors;
      }

      $note->update(['name' => $request->name]);
      return $note;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

    }

    public function validateCategory($request) {
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
