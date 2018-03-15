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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'PageController@index')->name('home');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::get('/traveltips', 'PageController@traveltips')->name('traveltips');
Route::get('/tours', 'PageController@tours')->name('tours');
Route::get('/holidays', 'PageController@holidays')->name('holidays');
Route::get('/citybreaks', 'PageController@citybreaks')->name('citybreaks');
Route::get('/specialoffers', 'PageController@specialoffers')->name('specialoffers');
Route::resource('tour', 'ToursController');
//Route::get('/gallery', 'PageController@gallery')->name('gallery');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'admin'], function(){
    Route::resource('admin/categories', 'AdminCategoriesController');
    Route::resource('admin/media', 'AdminMediasController');
    Route::resource('admin/roles', 'AdminRolesController');
    Route::resource('admin/destinations', 'AdminDestinationsController');
    Route::resource('admin/tours', 'AdminToursController');

	Route::get('/admin', function(){
			return view('admin.index');
		})->name('admin');
    // To create a different route, using a personalized name for this URI
    // We need to create a function like this, like functions created in CMS
    // Exercises.
//    Route::get('admin/media/upload', ['as'=>'admin.media.upload', function()]);
});