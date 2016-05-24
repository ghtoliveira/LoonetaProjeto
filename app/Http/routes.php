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


//Route::post('post_criar_reclamacao', 'ReclamacaoController@votoPositivo');
Route::post('post_criar_reclamacao', 'ReclamacaoController@reclamacaoRedirect');
Route::post('reclamacao/comentar', 'ComentarioController@comentar');

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
    'uses' => 'UsuarioController@administradores'
));

Route::post('buscarUsuario', array (
   'as' => 'buscarUsuario',
    'uses' => 'UsuarioController@buscar'
));

Route::post('adicionarAdministrador', array (
    'as' => 'adicionarAdministrador',
    'uses' => 'UsuarioController@adicionarAdministrador'
));

Route::post('removerAdministrador', array (
    'as' => 'removerAdministrador',
    'uses' => 'UsuarioController@removerAdministrador'
));

Route::auth();

Route::get('/home', 'HomeController@index');
