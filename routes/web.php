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
    Route::resource('/registrar', 'registroController');
    Route::get('/', 'Admin\AdminController@index')->name('home');
    Route::get('/usuarios', 'HomeController@listarUsuario')->name('listarUser');

    //referente a turmas
    Route::get('/registrar-turmas', 'Turma\TurmaController@index')->name('turmas/registrar');
    Route::get('/turmas-listar', 'Turma\TurmaController@show')->name('turmas/listar');
    Route::get('/turmas-listar/alunos/{id}', 'Turma\TurmaController@alunos')->name('turmaVerMais');
    Route::post('/registrar-turmas', 'Turma\TurmaController@create')->name('turmas/registrar');
    Route::get('/turmas-editar/{turma}', 'Turma\TurmaController@edit')->name('turmas/editar');
    Route::post('/turmas-atualizar/{turma}', 'Turma\TurmaController@update')->name('turmas/update');

    //registrar usuario
    Route::get('/registrar', 'registroController@index')->name('registrar');
    Route::post('/registrar/efetuar', 'registroController@store')->name('efetuarRegistro');

    //rotas das avaliacoes
    Route::get('avaliacoes/{turma}/', 'AvaliacaoController@index')->name('turma/avaliacoes'); 
    Route::get('avaliacoes/cadastrar/{turma}/', 'AvaliacaoController@create')->name('turma/cadastrarAvaliacao');
    Route::post('avaliacoes/salvar/', 'AvaliacaoController@store')->name('turma/salvarAvaliacao');

    //rotas dos indicadores
    Route::get('indicador/registrar/{avaliacao}/', 'IndicadorController@create')->name('indicador/registrar');
    Route::post('indicador/{avaliacao}/registrar/', 'IndicadorController@store')->name('indicador/efetuar');
    Route::get('indicador/{indicador}/', 'IndicadorController@index')->name('indicador/mostrar');
});

Route::get('/home', 'HomeController@index')->name('home');
