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

Route::get('/', function () {
    return view('Frontend.homelayout');
});

Route::group(['namespace' => 'Admin'], function(){
	Route::get('admin/', 'HomeController@dashboard')->name('dashboard');
	/*Route::get('/{anypath}', 'HomeController@dashboard')->where('path','.*');*/

	Route::post('/addcategory','CategoryController@addcategory')->name('addcategory');
	Route::get('/category','CategoryController@allcategory')->name('allcategory');
	Route::get('/editcategory/{id}','CategoryController@editcategory')->name('editcategory');
	Route::post('/updatecategory/{id}','CategoryController@updatecategory')->name('updatecategory');
	Route::get('/deletecategory/{id}','CategoryController@deletecategory')->name('deletecategory');

	Route::get('/allpostget','PostController@index')->name('allpostget');
	Route::get('/postform','PostController@postform')->name('postform');
	Route::post('/savepost','PostController@savepost')->name('savepost');
	Route::get('/editpost/{id}','PostController@editpost')->name('editpost');
	Route::post('/updatepost/{id}','PostController@updatepost')->name('updatepost');
	Route::get('/postdelete/{id}','PostController@deletepost')->name('postdelete');
});
