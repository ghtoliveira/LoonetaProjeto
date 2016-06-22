<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Status as Status;

class StatusController extends Controller
{
    public function getStatus(){
        $statuses = Status::all();

        return view('painel\statuses', array('statuses' => $statuses));
    }

    public function postAdicionarstatus(Request $request){
        $status = new Status;
        $status->nome = $request->input('nome');
        $status->descricao= $request->input('descricao');

        $status->save();

        return redirect()->back();
    }
}
