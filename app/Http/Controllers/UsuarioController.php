<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User as User;
use App\Funcao as Funcao;
use App\Punicao as Punicao;

class UsuarioController extends Controller
{


    public function moderadores(){
        $usuarios = User::all();
        $moderadores = array();
        foreach($usuarios as $usuario){
            if($usuario->funcoes()->where('nome', 'moderador')->first()){
                $moderadores[] = $usuario;
            }
        }

        return view('funcoes\moderadores', array('moderadores' => $moderadores));
    }

    public function administradores(){
        $usuarios = User::all();
        $admins = array();
        foreach($usuarios as $usuario){
            if($usuario->funcoes()->where('nome', 'administrador')->first()){
                $admins[] = $usuario;
            }
        }


        return view('funcoes\administradores', array('admins' => $admins));
    }

    public function adicionarModerador(Request $request){
        $usuario = User::find($request->input('usuarioId'));
        $funcao = Funcao::all()->where('nome', 'moderador')->first();
        $usuario->funcoes()->attach($funcao->id);
        return $this->moderadores();
    }

    public function removerModerador(Request $request){
        $usuario = User::find($request->input('usuarioId'));
        $funcao = Funcao::all()->where('nome', 'moderador')->first();
        $usuario->funcoes()->detach($funcao->id);

        return $this->moderadores();
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


    public function mutar(Request $request){
        $usuario = User::find($request->input('usuarioId'));
        $mute = Punicao::all()->where('nome','mutado')->first();
        $usuario->punicoes()->attach($mute->id);

        //TODO: Criar uma view/atuailizar a página ao mutar usuário


        return view('home');
    }

    public function desmutar(Request $request){
        $usuario = User::find($request->input('usuarioId'));
        $mute = Punicao::all()->where('nome','mutado')->first();
        $usuario->punicoes()->detach($mute->id);

        return view('home');
    }

}
