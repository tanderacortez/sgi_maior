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
    Route::post('/store', 'ProjetosController@store'); //chamando o post para inserção dos dados no banco
    Route::post('/update', 'ProjetosController@update'); //chamando o post para inserção dos dados no banco
    Route::get('/{id}/editar', 'ProjetosController@viewEditar');
    Route::get('/{id}/detalhe', 'ProjetosController@viewNovo');
    Route::get('/{id}/delete_projetos', 'ProjetosController@delete_projetos'); //chamando o post para inserção dos dados no banco

});

Route::group(['prefix' => 'usuarios'], function (){
    Route::get('/', 'UsuariosController@viewListagem');
    Route::get('/novo', 'UsuariosController@viewNovo');
    Route::get('/{id}/editar', 'UsuariosController@viewEditar');
    Route::get('/{id}/_add_credencial', 'UsuariosController@add_credencial')->name('usuarios.credenciais._addCred'); // Adiciona credencial para o usuário
    Route::post('/{id}/store_credencial', 'UsuariosController@store_credencial')->name('usuarios.store_credencial'); // Adiciona credencial para o usuário
    Route::post('/store', 'UsuariosController@store'); //chamando o post para inserção dos dados no banco
    Route::post('/update', 'UsuariosController@update'); //chamando o post para inserção dos dados no banco
    Route::get('/{id}/delete', 'UsuariosController@destroy'); //Excluindo usuário
});

Route::group(['prefix' => 'usuarios/credenciais'], function (){
    Route::get('/', 'CredenciaisController@viewListagem');
    Route::get('/novo', 'CredenciaisController@viewNovo')->name("usuarios.credenciais.novo");
    Route::get('/{id}/editar', 'CredenciaisController@viewEditar');
    Route::get('/{id}/editar_permcred', 'CredenciaisController@viewEditar_PermCred');
    Route::post('/{id}/store_permissao', 'CredenciaisController@store_permissao')->name('usuarios.credenciais.store_permissao'); //Salvando a permissao da credencial
    Route::post('/store', 'CredenciaisController@store'); //chamando o post para inserção dos dados no banco
    Route::post('/update', 'CredenciaisController@update'); //chamando o post para inserção dos dados no banco
    Route::get('/{id}/delete', 'CredenciaisController@delete'); //chamando o post para inserção dos dados no banco
    Route::get('/{id}/{permissao_id}/destroy_permcred', 'CredenciaisController@destroy_permcred')->name('usuarios.credenciais.destroy_permcred'); //chamando o post para inserção dos dados no banco
});

Route::apiResources([
    'permissoes' => 'PermissoesController' // PERMISSÕES STORE
    //'posts' => 'PostController'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
