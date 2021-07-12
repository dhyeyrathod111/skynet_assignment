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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function() {
    \Artisan::call('config:cache');
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    \Artisan::call('optimize:clear');
    \Session::flush();
});


//===========================================================================================

Route::get('assignment/load_data','AssignmentController@load_data');
Route::get('assignment/delete_record/{assignment_id}','AssignmentController@delete_record');
Route::resource('assignment','AssignmentController');

