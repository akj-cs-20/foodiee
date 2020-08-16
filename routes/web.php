<?php

use Illuminate\Support\Facades\Route;


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('category', 'CategoryController')->middleware('auth');
Route::resource('food', 'FoodController')->middleware('auth');

Route::get('/', 'FoodController@listFood');
Route::get('/foods/{id}', 'FoodController@view')->name('food.view');