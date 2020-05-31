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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'BookController@index')->name('home');

 

// Route::group(['prefix' => 'UserSetting'], function () {
//     Route::get('', 'UserSettingController@index')->name('UserSetting.index');
//     Route::post('update', 'UserSettingController@update')->name('UserSetting.update');
// });

Route::group(['prefix' => 'book'], function () {
    Route::get('/{id}', 'GuestbooksController@index')->name('book.index');
    Route::post('update', 'GuestbooksController@update')->name('book.update');
    Route::post('store', 'GuestbooksController@store')->name('book.store');
});

Route::group(['prefix' => 'pages'], function () {
    Route::get('/{id}', 'GuestPageController@index')->name('pages.index');
});

Route::group(['prefix' => 'adminbooks'], function () {
    Route::get('/{id}', 'BookController@show')->name('adminbooks.show');
    Route::get('/{id}/{name}', 'BookController@edit')->name('adminbooks.edit');
    Route::post('update', 'BookController@update')->name('adminbooks.update');
    Route::post('store', 'BookController@store')->name('adminbooks.store');
});
 
Route::group(['prefix' => 'createbooks'], function () {
    Route::get('/{id}/{name}', 'BookController@create')->name('createbooks');
});


 
Route::group(['prefix' => 'adminpages'], function () {
    Route::post('update', 'PagesController@update')->name('adminpages.update');
    Route::post('store', 'PagesController@store')->name('adminpages.store');
});


Route::group(['prefix' => 'viewupdate'], function () {
    Route::get('/{id}', 'GuestPageController@show')->name('viewupdate.show');
});
