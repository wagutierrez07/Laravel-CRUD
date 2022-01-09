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
//Listas de usuarios
Route::get('/', 'employeesController@index');
//Listas de usuarios
Route::get('/list', 'employeesController@list');
//Formulario de registro
Route::get('/form', 'employeesController@userForm');
//Mensaje de almacenado
Route::post('/save', 'employeesController@save')->name('save');
//Eliminacion de un usuario
Route::delete('/delete/{id}', 'employeesController@delete')->name('delete');
//formulario de edicion de un usuario
Route::get('/editform/{id}', 'employeesController@editForm')->name('editform');
//edicion de un usuario
Route::patch('/edit/{id}', 'employeesController@edit')->name('edit');
