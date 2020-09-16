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

Route::get('/','AuthenticateController@index')->name('firstPage');
Route::post('/','AuthenticateController@login'); 
Route::get('/exit', 'AuthenticateController@logout');
    
//INICIO ROTAS DE USUARIO
    Route::group(['prefix' => 'reception' ,'middleware' => ['auth_ckn']], function(){
        //ABRIR VIEW DA PAGINA DE USUARIO
        Route::get('/', 'receptionController@index')->name('reception'); 
        Route::post('/', 'receptionController@searchEmployee');  
        Route::post('update/collaborator', 'receptionController@updateCollaborator');  
        Route::get('employee_list', 'receptionController@employee_list');  
    });
//TÉRMINO ROTAS DE USUARIO

//INICIO ROTAS DE FUNCIONÁRIOS
    Route::group(['prefix' => 'collaborator' ,'middleware' => ['auth_ckn']], function(){
        //ABRIR VIEW DA PAGINA DE USUARIO 
        Route::get('/', 'CollaboratorController@index')->name('collaborator');   
        Route::post('/', 'CollaboratorController@store');  
        Route::get('employee_list', 'CollaboratorController@employee_list');  
        Route::get('list', 'CollaboratorController@list');  
    });
//TÉRMINO ROTAS DE FUNCIONÁRIOS