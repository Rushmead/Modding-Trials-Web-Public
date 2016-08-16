<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'StaticController@index');
Route::get('about', 'StaticController@about');
Route::get('rules', 'StaticController@rules');
Route::get('contact', 'StaticController@contact');
Route::get('join', 'StaticController@join');
Route::get('results', 'StaticController@results');

Route::get('competitors', 'EntryController@competitors');
Route::get('enter', 'EntryController@enter');
Route::post('enter/entry', 'EntryController@newEntry');


Route::get('admin', 'AdminController@admin');
Route::get('admin/category/new', 'CategoryController@newPage');
Route::get('admin/category/edit/{id}', 'CategoryController@editPage');
Route::get('admin/category/remove/{id}', 'CategoryController@remove');

Route::post('admin/login', 'AdminController@login');
Route::post('admin/category/new', 'CategoryController@create');
Route::post('admin/category/save', 'CategoryController@save');

Route::get('vote', 'VoteController@votePage');
Route::get('vote/categorys', 'VoteController@categorys');
Route::post('vote/vote', 'VoteController@vote');
Route::get('results/all', 'VoteController@results');