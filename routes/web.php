<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('category', 'CategoryController')->middleware('auth');
Route::resource('food', 'FoodController')->middleware('auth');