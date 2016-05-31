<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Auth\AuthController as Auth;
use App\Reclamacao as Reclamacao;
use App\Status as Status;
use App\Tag as Tag;
use App\Voto as Voto;

class ReclamacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reclamacao = Reclamacao::all();
        return view('Reclamacao\reclamacoes', array('reclamacoes' => $reclamacao));
    }

    public function reclamar()
    {
        $tags = Tag::all();

        return view('Reclamacao\reclamar', array('tags' => $tags));
    }

    public function reclamacao($id)
    {
        $reclamacao = Reclamacao::find($id);
        return view('reclamacao', array('reclamacao' => $reclamacao));
    }


    public function reclamacaoRedirect(Request $request)
    {
        $reclamacao = new Reclamacao;
        $tag = Tag::all()->where('nome', $request->input('tag'))->first();
        $status = Status::all()->where('nome', 'Não Enviada')->first();

        $reclamacao->titulo = $request->input('titulo');
        $reclamacao->descricao = $request->input('descricao');
        $reclamacao->usuario_id = $request->user()->id;
        $reclamacao->status_id = $status->id;
        $reclamacao->save();



        $reclamacao->tags()->attach($tag->id);


        $reclamacoes = Reclamacao::all();
        return view('Reclamacao\reclamacoes', array('reclamacoes' => $reclamacoes));
    }


    public function detalhes($id)
    {
        $reclamacao = Reclamacao::find($id);
        return view('Reclamacao\reclamacaoDetalhe', array('reclamacao' => $reclamacao));
    }

    public function votar(Request $request)
    {

        $positivo = $request['positivo'] === 'true';
        $reclamacaoId = $request['reclamacaoId'];
        $reclamacao = Reclamacao::find($reclamacaoId);


        if (!$reclamacao) {
            echo "n existe" . $reclamacaoId;
            return null;
        }

        $usuario = $request->user();
        $voto = $usuario->votos()->where('reclamacao_id', $reclamacaoId)->first();

        if ($voto) {
            if ($voto->positivo == true && $positivo)
                $voto->delete();
            else if ($voto->positivo == false && $positivo) {
                $voto->positivo = true;
                $voto->update();
            } else if ($voto->positivo == true && !$positivo) {
                $voto->positivo = false;
                $voto->update();
            } else if ($voto->positivo == false && !$positivo)
                $voto->delete();
        } else {
            $novoVoto = new Voto;
            $novoVoto->user_id = $usuario->id;
            $novoVoto->reclamacao_id = $reclamacaoId;
            $novoVoto->positivo = $positivo;
            $novoVoto->save();
        }

    }


}
