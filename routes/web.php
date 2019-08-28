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
    return redirect('/employees');
});

Route::resource('employees', 'EmployeeController');
Route::resource('experiences', 'ExperienceController');
Route::get('modal', 'Controller@modal')->name('modal.delete');
Route::get('search', 'EmployeeController@search')->name('employees.search');
