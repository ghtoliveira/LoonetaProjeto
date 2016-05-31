<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function reclamacoes(){
        return $this->belongsToMany('App\Reclamacao', 'reclamacao_tag', 'reclamacao_id', 'reclamacao_id');
    }
}
