<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function reclamacoes(){
        return $this->belongsToMany('App\Reclamacao');
    }
}
