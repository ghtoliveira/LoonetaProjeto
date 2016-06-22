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
       
       $comentario->comentario = $request->input('comentario');
       $comentario->reclamacao_id = $request->input('reclamacaoId');
       $comentario->usuario_id = $request->user()->id;

       $comentario->save();

       return redirect()->back();
   }

    public function deletar(Request $request){
        $comentario = Comentario::find($request->input('comentarioId'));
        $comentario->delete();
        return redirect()->back();
    }
}
