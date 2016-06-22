<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Comentario as Comentario;
use App\Reclamacao as Reclamacao;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    //TODO: Remover isso, apenas para testes.
    public function painel(){

        /*
        $comentarios = Comentario::all();
        $comentariosDenunciados = array();
        foreach($comentarios as $comentario){
            if($comentario->isDenunciado($comentario->id))
                $comentariosDenunciados[] = $comentario;
        }
        
        return view('dashboard', array('comentarios' => $comentariosDenunciados, ''));
        TODO: Implementar denuncia de comentarios
        */

        $reclamacoes = Reclamacao::all();
        $reclamacoesDenunciadas = array();

        foreach($reclamacoes as $reclamacao){
            if($reclamacao->isDenunciada($reclamacao->id))
                $reclamacoesDenunciadas[] = $reclamacao;
        }
        
        $numReclamacoesDenunciadas = count($reclamacoesDenunciadas);

        return view ('dashboard', array('reclamacoesDenunciadas' => $reclamacoesDenunciadas,
            'numReclamacoesDenunciadas' => $numReclamacoesDenunciadas
            ));

    }
}
