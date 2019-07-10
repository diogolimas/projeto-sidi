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
//Route::get('/','Admin\AdminController@index')->name('admin');
Auth::routes();
Route::group( ['middleware' => 'auth'], function(){
    Route::resource('/registrar/aluno', 'AlunoController');
    Route::resource('/registrar/professor', 'ProfessorController');
    Route::resource('/registrar/admin', 'registroController');
    Route::get('/', 'Admin\AdminController@index')->name('home');
    Route::get('/usuarios', 'HomeController@listarUsuario')->name('listarUser');

    //referente a turmas
    Route::get('/registrar-turmas', 'Turma\TurmaController@index')->name('turmas/registrar');
    Route::post('/registrar-turmas', 'Turma\TurmaController@create')->name('turmas/registrar');


    Route::get('/registrar', 'HomeController@registro')->name('registrar');

    Route::get('/registrar/aluno', 'AlunoController@index')->name('registrarAluno');
    Route::get('/registrar/professor', 'ProfessorController@index')->name('registrarProfessor');
    Route::get('/registrar/admin', 'registroController@index')->name('registrarAdmin');

    Route::post('/registrar/aluno/efetuar', 'AlunoController@store')->name('RegistrarAluno');
    Route::post('/registrar/professor/efetuar', 'ProfessorController@store')->name('RegistrarProfessor');
    Route::post('/registrar/admin/efetuar', 'registroController@store')->name('RegistrarAdmin');
});

Route::get('/home', 'HomeController@index')->name('home');
