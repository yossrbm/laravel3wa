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

Route::get('/', 'TestController@showClassroomList');

Route::get('/classroom/list', 'TestController@showClassroomList')->name('showClassroomList');

Route::get('/classroom/add', 'TestController@showAddClassroom')->name('showAddClassroom');
Route::post('/classroom/add', 'TestController@handleAddClassroom')->name('handleAddClassroom'); // pr ajouter dans la base

Route::get('/student/add', 'TestController@showAddStudent')->name('showAddStudent');
Route::post('/student/add', 'TestController@handleAddStudent')->name('handleAddStudent'); 
Route::get('/student/delete/{id}', 'TestController@handleDeleteStudent')->name('handleDeleteStudent');
Route::get('/student/view/{id}', 'TestController@showStudent')->name('showStudent');



Route::middleware(['check'])->group(function () {

	Route::get('/classroom/add', 'TestController@showAddClassroom')->name('showAddClassroom');
	Route::get('/student/delete/{id}', 'TestController@handleDeleteStudent')->name('handleDeleteStudent');
	Route::get('/student/update/{id}', 'TestController@showUpdateStudent')->name('showUpdateStudent');
	Route::post('/student/update/{id}', 'TestController@handleUpdateStudent')->name('handleUpdateStudent');
   
});

Route::get('/student/login', 'TestController@showStudentLogin')->name('showStudentLogin');
Route::post('/student/login', 'TestController@handleStudentLogin')->name('handleStudentLogin');
Route::get('/student/logout', 'TestController@handleStudentLogout')->name('handleStudentLogout');
