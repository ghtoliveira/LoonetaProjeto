<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});


Route::get('/home', 'HomeController@index');
Route::get('/reclamacoes', 'ReclamacaoController@index');
Route::get('/reclamar', 'ReclamacaoController@reclamar');
Route::get('/reclamacao/{id}', 'ReclamacaoController@detalhes');



Route::post('post_criar_reclamacao', 'ReclamacaoController@reclamacaoRedirect');
Route::post('reclamacao/comentar', 'ComentarioController@comentar');
Route::get('/reclamacao/denunciar/{id}', array(
    'as' => 'getDenunciarReclamacao',
    'uses' => 'UsuarioController@getDenunciar'
));
Route::post('/reclamacao/denunciar', array(
    'as' => 'postDenunciarReclamacao',
    'uses' => 'UsuarioController@postDenunciar'
));


Route::post('/voto', array(
    'as' => 'voto',
    'uses' => 'ReclamacaoController@votar'
));

Route::post('/votoNegativo', array(
    'as' => 'votoNegativo',
    'uses' => 'ReclamacaoController@votoNegativo'
));

Route::get('/administradores', array(
    'as' => 'administradores',
    'uses' => 'UsuarioController@administradores',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador']
));

Route::get('/painel/buscar', array(
    'as' => 'buscarUsuarioView',
    'uses' => 'UsuarioController@getBuscar',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador', 'moderador']
));

Route::get('/painel/buscar/email', array(
    'as' => 'buscarUsuarioEmail',
    'uses' => 'UsuarioController@getBuscarEmail',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador', 'moderador']
));

Route::get('/moderadores', array(
    'as' => 'moderadores',
    'uses' => 'UsuarioController@moderadores',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador']
));

Route::post('buscarUsuario', array (
   'as' => 'buscarUsuario',
    'uses' => 'UsuarioController@buscar',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador']
));

Route::post('adicionarAdministrador', array (
    'as' => 'adicionarAdministrador',
    'uses' => 'UsuarioController@adicionarAdministrador',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador']
));

Route::post('adicionarModerador', array (
    'as' => 'adicionarModerador',
    'uses' => 'UsuarioController@adicionarModerador',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador']
));

Route::post('removerAdministrador', array (
    'as' => 'removerAdministrador',
    'uses' => 'UsuarioController@removerAdministrador',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador']
));

Route::post('removerModerador', array (
    'as' => 'removerModerador',
    'uses' => 'UsuarioController@removerModerador',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador']
));

Route::post('/comentario/deletar', array(
    'as' => 'postDeletarComentario',
    'uses' => 'ComentarioController@deletar',
));

Route::post('modDeletarComentario', array (
    'as' => 'modDeletarComentario',
    'uses' => 'ComentarioController@deletar',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador', 'moderador']
));

Route::post('modMutarUsuario', array (
    'as' => 'modMutarUsuario',
    'uses' => 'UsuarioController@mutar',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador', 'moderador']
));

Route::post('modDesmutarUsuario', array (
    'as' => 'modDesmutarUsuario',
    'uses' => 'UsuarioController@desmutar',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador', 'moderador']
));

Route::get('/painel', array(
    'uses' => 'HomeController@painel',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador', 'moderador']

));

Route::get('/painel/tags', array(
    'as' => 'getTags',
    'uses' => 'TagController@getTags',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador', 'moderador']
));

Route::get('/painel/status', array(
    'as' => 'getStatuses',
    'uses' => 'StatusController@getStatus',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador', 'moderador']
));

Route::post('/painel/tags/', array(
    'as' => 'postAdicionarTag',
    'uses' => 'TagController@postAdicionarTag',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador', 'moderador']
));

Route::post('/painel/status/', array(
    'as' => 'postAdicionarStatus',
    'uses' => 'StatusController@postAdicionarStatus',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador', 'moderador']
));

Route::post('/painel/mutarUsuario', array(
    'as' => 'mutarUsuario',
    'uses' => 'usuarioController@mutar',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador', 'moderador']
));

Route::post('/painel/desmutarUsuario', array(
    'as' => 'desmutarUsuario',
    'uses' => 'usuarioController@desmutar',
    'middleware' => 'funcoes',
    'funcoes' => ['administrador', 'moderador']
));



Route::auth();

Route::get('/home', 'HomeController@index');
