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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::when('*','csrf',['post','put','delete']);

Route::get('/',['as' => 'home', 'uses' => 'PostsController@index']);
Route::get('/posts/{slug}','PostsController@show')->name('posts');

Route::post('/traitement','UserController@check')->name('traitement');
Route::get('/deconnexion','UserController@deconnexion')->name('logout');

Route::get('/administration','HomeController@admin')->name('admin');

Route::get('/administration/posts','PostsController@admin')->name('adminPost');
Route::get('/administration/post/create','PostsController@create')->name('adminCreate');
Route::post('/administration/post/create','PostsController@sauvegarder')->name('saving');

Route::get('/administration/post/{id}','PostsController@edit')->name('postEdit');
Route::post('/administration/post/update/{id}','PostsController@update')->name('modifier');

Route::delete('/administration/post/supprimer/{id}','PostsController@delete')->name('supprimer');


Route::post('/posts/{id}/comments/create','CommentsController@create')->name('createComment');

Route::get('/administration/users','UserController@admin')->name('gestUser');
Route::delete('/administration/user/{id}','UserController@deleteUser')->name('userDelete');
Route::post('/administration/permission/{id}','UserController@permission')->name('permission');

Route::get('/administration/comments','CommentsController@admin')->name('Commentaires');
Route::delete('/administration/comments/delete/{id}','CommentsController@delete')->name('commentDelete');

//Route::group(['before' => 'guest'], function(){

Route::get('/login','UserController@login')->name('login');
Route::get('/register','UserController@register')->name('register');

Route::post('/register','UserController@store')->name('valide');

//});