<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comentario as Comentario;
use App\Http\Controllers\Auth\AuthController as Auth;
use App\Reclamacao as Reclamacao;
use App\User as Usuario;

class ComentarioController extends Controller
{


   public function comentar(Request $request){
     $comentario = new Comentario;

     $comentario->titulo = $request->input('titulo');
     $comentario->comentario = $request->input('comentario');
     $comentario->reclamacao_id = $request->input('reclamacaoId');
     $comentario->usuario_id = $request->user()->id;

     $comentario->save();

     $reclamacao = Reclamacao::find($request->input('reclamacaoId'));
     return view('Reclamacao\reclamacaoDetalhe', array('reclamacao' => $reclamacao));
   }
}
