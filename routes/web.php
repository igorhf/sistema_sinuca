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

Route::resource('cadastro', 'usuariosController');

Route::resource('login', 'loginController'); 

Route::resource('deslogar', 'deslogarController');

Route::resource('aposta', 'apostasController');