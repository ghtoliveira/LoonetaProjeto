<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comentario as Comentario;
use App\Http\Controllers\Auth\AuthController as Auth;
use App\Reclamacao as Reclamacao;
use App\Punicao as Punicao;
use App\User as Usuario;

class ComentarioController extends Controller
{


   public function comentar(Request $request){
       if ($request->user()->isMutado()) {
           //TODO: Criar uma view que informe aos usuários que eles estão mutados
           echo "Voce esta mutado";
           return null;
       }

       $comentario = new Comentario;

       $comentario->titulo = $request->input('titulo');
       $comentario->comentario = $request->input('comentario');
       $comentario->reclamacao_id = $request->input('reclamacaoId');
       $comentario->usuario_id = $request->user()->id;

       $comentario->save();

       $reclamacao = Reclamacao::find($request->input('reclamacaoId'));
       return view('Reclamacao\reclamacaoDetalhe', array('reclamacao' => $reclamacao));
   }

    public function deletar(Request $request){
        $comentario = Comentario::find($request->input('comentarioId'));
        $comentario->delete();
        $reclamacao = Reclamacao::find($comentario->reclamacao_id);
        return view('Reclamacao\reclamacaoDetalhe', array('reclamacao' => $reclamacao));
    }
}
