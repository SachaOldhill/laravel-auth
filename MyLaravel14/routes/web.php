<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/logged', 'HomeController@loggedPage')
->name('logged');
Route::get('/freehome', 'MainController@freehome')
->name('freehome');
Route::get('car', 'MainController@car')
->name('car');
Route::get('/car/edit/{id}', 'HomeController@edit')
->name('car-edit');
Route::post('/car/update/{id}', 'HomeController@update')
->name('car-update');
Route::get('/car/delete/{id}', 'HomeController@delete')
->name('delete');
// Route::get('/pilot/{id}', 'MainController@pilot')
// -> name('pilot');
//
// Route::get('/car/new', 'MainController@createCar')
// -> name('new-car');
//
// Route::post('/car/store', 'MainController@storeCar')
// ->name('store-car');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
