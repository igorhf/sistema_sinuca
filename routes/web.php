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


Route::resource('/', 'homeController');  

Route::get('vencedor','vencedorController@index'); 

//Route::post('cadastro', 'usuariosController@store');    
Route::resource('cadastro', 'usuariosController');

//Route::get('login', 'loginController@index');    
//Route::post('login', 'loginController@store');   
Route::resource('login', 'loginController'); 

Route::resource('deslogar', 'deslogarController');

//Route::post('aposta', 'apostasController@store');    
Route::resource('aposta', 'apostasController');