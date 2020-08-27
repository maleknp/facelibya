<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/1', function () {
    return view('home');
});






Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/members','HomeController@member')->name('members');
Route::get('/contact','HomeController@contact')->name('contact');
Route::post('/search','HomeController@search')->name('search');  
Route::get('/chat','HomeController@chat')->name('chat');  


Route::get('/pro/{id}','ProfileController@profile')->name('profile');
Route::get('/edit-profile/{id}','ProfileController@edit')->name('edit-profile');
Route::patch('/edit/{id}', 'ProfileController@update')->name('edit')->middleware('auth');    //to store new data of alls to data base
Route::patch('/edit-avatar/{id}', 'ProfileController@edit_avatar')->name('edit-avatar');    //to store new data of alls to data base
Route::patch('/edit-cover/{id}', 'ProfileController@edit_cover')->name('edit-cover');    //to store new data of alls to data base

Route::get('/notices','ProfileController@notices')->name('notices');
//changing password
Route::get('/changePassword','ProfileController@showChangePasswordForm')->name('change-password')->middleware('auth');
Route::post('/changePassword','ProfileController@changePassword')->name('changePassword');
Route::post('/interests','ProfileController@interests')->name('interests');


Auth::routes();


Route::get('/single/{id}', 'PostController@singlepost')->name('single');

Route::get('/post', 'PostController@index')->name('post');
Route::get('/edit-post/{id}', 'PostController@edit_post')->name('edit-post');
Route::patch('/edit-post/{id}', 'PostController@update_post')->name('update-post');
Route::delete('/delete-post/{id}', 'PostController@delete_post')->name('delete-post');

Route::post('/like','PostController@postLikePost')->name('like');
Route::post('/comlike','PostController@ComLikeCom')->name('comlike');
Route::post('/post', 'PostController@store')->name('post1');
Route::post('/comment/{id}','PostController@comment')->name('comment');
Route::delete('/delete-comment/{id}', 'PostController@delete_comment')->name('delete-comment');


