<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    public function usuarios(){
        return $this->belongsToMany('App\User', 'funcao_usuario', 'funcao_id', 'usuario_id');
    }
}
