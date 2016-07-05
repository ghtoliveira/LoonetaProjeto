<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Reclamacao as Reclamacao;

class DenunciaController extends Controller
{
    public function getDenunciasReclamacao($id){
        $reclamacao = Reclamacao::find($id);
        return view('denuncias\denuncias', array('denuncias' => $reclamacao->denuncias));
    }

    public function postRetirarDenuncia(Request $request){
        $reclamacao = Reclamacao::find($request->input('id'));
        $denuncias = $reclamacao->denuncias;
        foreach($denuncias as $denuncia){
            $denuncia->delete();
            //$reclamacao->denuncias->detach($denuncia->id);
        }

        return redirect()->back();
    }
}
