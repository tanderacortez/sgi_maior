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

Route::group(['prefix' => 'clientes'], function (){
    Route::get('/', 'ClientesController@viewListagem')->name('clientes.listagem');
    Route::get('/novo', 'ClientesController@viewNovo')->name('clientes.novo');
    Route::post('/store', 'ClientesController@store'); //chamando o post para inserção dos dados no banco
    Route::post('/update', 'ClientesController@update'); //chamando o post para inserção dos dados no banco
    Route::get('/{id}/editar', 'ClientesController@viewEditar')->name('clientes.editar');
    Route::get('/{id}/delete', 'ClientesController@delete'); //chamando o post para inserção dos dados no banco
});


Route::group(['prefix' => 'projetos'], function (){
    Route::get('/', 'ProjetosController@viewListagem');
    Route::get('/novo', 'ProjetosController@viewNovo');
    Route::get('/{id}/configuracao', 'ProjetosController@configuracoesView_Projetos'); //configurações
    Route::post('/store', 'ProjetosController@store'); //chamando o post para inserção dos dados no banco
    Route::post('/update', 'ProjetosController@update'); //chamando o post para inserção dos dados no banco
    Route::post('/update_configuracao', 'ProjetosController@update_configuracao'); //chamando o post para inserção dos dados no banco
    Route::get('/{id}/editar', 'ProjetosController@viewEditar');
    Route::get('/{id}/detalhe', 'ProjetosController@viewNovo');
    Route::get('/{id}/delete_projetos', 'ProjetosController@delete_projetos'); //chamando o post para inserção dos dados no banco

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
