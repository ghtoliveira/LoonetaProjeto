<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User as User;
use App\Funcao as Funcao;
use App\Punicao as Punicao;
use App\Denuncia as Denuncia;
use App\Reclamacao as ReclamacaoClass;
use Illuminate\Support\Facades\Redirect;

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
        return redirect()->back();
    }

    public function removerModerador(Request $request){
        $usuario = User::find($request->input('usuarioId'));
        $funcao = Funcao::all()->where('nome', 'moderador')->first();
        $usuario->funcoes()->detach($funcao->id);

        return redirect()->back();
    }

    public function adicionarAdministrador(Request $request){
        $id = $request->input('usuarioId');
        $usuario = User::find($id);
        $funcao = Funcao::all()->where('nome', 'administrador')->first();
        $usuario->funcoes()->attach($funcao->id);

        return redirect()->back();
    }

    public function removerAdministrador(Request $request){
        $id = $request->input('usuarioId');
        $usuario = User::find($id);
        $funcao = Funcao::all()->where('nome', 'administrador')->first();
        $usuario->funcoes()->detach($funcao->id);

        return redirect()->back();
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

    public function getBuscar(Request $request){
        return view('painel\buscarUsuario');
    }

    public function getBuscarEmail(Request $request){
        $usuario = User::all()->where('email', $request->input('email'))->first();
        if($usuario){
            $comentarios = $usuario->comentarios;
            $reclamacoes = $usuario->reclamacoes;
            return view('painel\buscarUsuario', array('usuario' => $usuario,
                'comentarios' => $comentarios,
                'reclamacoes' => $reclamacoes));
        } else {
            $erro = "Usuario não encontrado, tente novamente";
            return view('painel\buscarUsuario', array('erro' => $erro));
        }
    }


    public function mutar(Request $request){
        $usuario = User::find($request->input('usuarioId'));
        $mute = Punicao::all()->where('nome','mutado')->first();
        $usuario->punicoes()->attach($mute->id);

        //TODO: Criar uma view/atuailizar a página ao mutar usuário


        return redirect()->back();
    }

    public function desmutar(Request $request){
        $usuario = User::find($request->input('usuarioId'));
        $mute = Punicao::all()->where('nome','mutado')->first();
        $usuario->punicoes()->detach($mute->id);

        return redirect()->back();
    }

    public function getDenunciar($id){
        $reclamacaoo = ReclamacaoClass::all()->where('id', (int) $id)->first();
        return view('Reclamacao\denunciar', array('reclamacao' => $reclamacaoo));
    }

    public function postDenunciar(Request $request){
//        $usuario = User::find($request->user()->id);
//Acho que não precisa        $reclamacao = Reclamacao::all()->where('id',$request->input('reclamacaoId'));

        $denuncia = new Denuncia();
        $denuncia->user_id = $request->user()->id;
        $denuncia->reclamacao_id = $request->input('idReclamacao');
        $denuncia->denuncia = $request->input('denuncia');

        $denuncia->save();






    }

}
