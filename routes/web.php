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

Route::get('/', 'AdminController@index');
Route::get('/home', function () { return view('dashboard');});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/profile/{id}','AdminController@profile');
Route::get('/add_user/','AdminController@add_user');
Route::get('/view_users/','AdminController@view_users');
Route::get('/edit_users/{id}','AdminController@edit_users');
Route::get('/add_salary', 'AdminController@add_salary');
Route::get('/view_salary/','AdminController@view_salary');
Route::get('/edit_salary/{id}','AdminController@edit_salary');
Route::get('/add_subadmin','AdminController@add_subadmin');

Route::post('/update_user/{id}','AdminController@update_user');
Route::post('/insert_users/','AdminController@insert_users');
Route::post('do_login','AdminController@do_login');
Route::post('/change_status/','AdminController@change_status');
Route::post('/delete_record/','AdminController@delete_record');
Route::post('/insert_user_salary/','AdminController@insert_user_salary');
Route::post('/update_salary/{id}','AdminController@update_salary');
























