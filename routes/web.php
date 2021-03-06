<?php

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


Auth::routes();
Route::get('/','QuestionController@home')->name('home');


// ログイン状態
Route::group(['middleware' => 'auth'], function() {

    
    Route::get('users/register_done','UsersController@add');
    Route::get('users/profile_edit','UsersController@edit')->name('edit');
    Route::post('users/profile_set','UsersController@update')->name('profile_set');
    Route::get('users/my_profile','UsersController@my_profile')->name('my_profile');

    Route::get('questions/create','QuestionController@add')->name('question_create');
    Route::get('questions/post_done','QuestionController@update');
    Route::post('questions/post_done','QuestionController@create');
    Route::post('questions/edit','QuestionController@edit');
    Route::post('questions/update','QuestionController@update');
    Route::get('questions/delete','QuestionController@delete');
    Route::get('questions/best_answer','QuestionController@best_answer');
    
    Route::post('questions/answer','AnswersController@create');
    
    Route::get('answers/add','AnswersController@add');
    Route::get('answers/delete','AnswersController@delete');
    
    Route::post('bookmarks/add','BookmarkController@add');
    Route::get('users/bookmark','BookmarkController@index');
    Route::get('users/delete','BookmarkController@delete');
    
    Route::get('contacts/index','ContactController@index');

});

// ゲスト状態
Route::get('users/profile','UsersController@index')->name('profile');
// Route::post('users/profile','UsersController@index')->name('profile');
Route::get('users/private_question','QuestionController@private_question')->name('private_question');


Route::post('questions/question','QuestionController@show')->name('question');
Route::get('questions/question','QuestionController@show')->name('show_question');
Route::get('questions/index','QuestionController@index');
Route::get('questions/new_question','QuestionController@new_question');


Route::get('contacts/create','ContactController@add')->name('contact');
Route::post('contacts/create','ContactController@create')->name('contact_done');


