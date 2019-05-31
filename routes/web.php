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
    return view('index');
});


Auth::routes();

/**
 * Get routes
 */
Route::get('/home', 'HomeController@index')->name('home');


Route::get('home/videos','VideosController@index')->name('home.videos');
Route::get('home/videos/more','VideosController@all')->name('home.videos.more');

Route::get('home/notes','NotesController@index')->name('home.notes');
Route::get('home/notes/more','NotesController@index')->name('home.notes.more');


Route::get('home/hostels','HostelsController@index')->name('home.hostels');
Route::get('home/hostels/more','HostelsController@index')->name('home.hostels.more');

Route::get('home/others','VideosController@index')->name('others');

Route::get('home/videos/{id}','VideosController@show');
Route::get('home/notes/{id}','NotesController@show');
Route::get('home/hostel/{id}','HostelsController@show');
Route::get('home/hostel/book/{id}','HostelsController@getbook');
Route::get('home/notes/download/{id}','NotesController@download');
Route::get('home/bookings','HostelsController@bookings')->name('home.bookings');

/**
 * Post routes
 */
Route::post('contact/message','MessagesController@store');

Route::post('/videos/add','VideosController@store')->name('videos/add');
Route::post('/notes/add','NotesController@store')->name('notes/add');
Route::post('/hostel/add','HostelsController@store')->name('hostel/add');
Route::post('hostel/book','HostelsController@book');
