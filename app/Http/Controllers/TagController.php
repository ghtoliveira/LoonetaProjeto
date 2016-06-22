<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag as Tag;

class TagController extends Controller
{
    public function getTags(){
        $tags = Tag::all();
        return view('painel\tags', array('tags' => $tags));
    }

    public function postAdicionarTag(Request $request){
        $tag = new Tag;
        $tag->nome = $request->input('tag');
        $tag->descricao = $request->input('descricao');

        $tag->save();

        return redirect()->back();

    }
}
