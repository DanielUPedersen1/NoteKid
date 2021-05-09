<?php

use Illuminate\Support\Facades\Route;
#use Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('login', function () {
    return view('auth/login');
});

Auth::routes();
Route::resource('notes', 'NoteController')->middleware('auth');
Route::resource('tags', 'TagController')->middleware('auth');
Route::resource('categories', 'CategoryController')->middleware('auth');