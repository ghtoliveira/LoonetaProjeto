<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Punicao extends Model
{
    public function usuarios(){
        return $this->belongsToMany('App\User', 'usuario_punicao', 'punicao_id', 'usuario_id');
    }
}
