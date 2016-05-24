<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User as User;
use App\Funcao as Funcao;

class UsuarioController extends Controller
{


    public function moderadores(){
        //mostrar view contendo todos os moderadores e um form para adicionar mais
    }

    public function administradores(){
        $usuarios = User::all();
        $admins = array();
        foreach($usuarios as $usuario){
            if($usuario->funcoes()->where('nome', 'administrador')->first()){
                $admins[] = $usuario;
            }
        }

        //echo print_r($admins);

        return view('funcoes\administradores', array('admins' => $admins));
    }

    public function adicionarModerador(Request $request){
        //adicionar um novo moderador à base de dados
    }

    public function removerModerador(Request $request){
        //Remover moderador
    }

    public function adicionarAdministrador(Request $request){
        $id = $request->input('usuarioId');
        $usuario = User::find($id);
        $funcao = Funcao::all()->where('nome', 'administrador')->first();
        $usuario->funcoes()->attach($funcao->id);

        return view('funcoes\administradorAdicionado');
    }

    public function removerAdministrador(Request $request){
        $id = $request->input('usuarioId');
        $usuario = User::find($id);
        $funcao = Funcao::all()->where('nome', 'administrador')->first();
        $usuario->funcoes()->detach($funcao->id);

        return view('funcoes\administradorAdicionado');
    }

    public function buscar(Request $request) {
        $email = $request->input('email');
        $usuario = User::all()->where('email', $email)->first();
        if($usuario) {
            return view('funcoes\usuarioDetalhes', array('usuario' => $usuario));
        }
        else{
            return view('funcoes\usuarioNaoEncontrado');
        }
    }







}
