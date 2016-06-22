<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    public function reclamacao(){
        return $this->belongsTo('App\Reclamacao');
    }
    public function usuario(){
        return $this->belongsTo('App\User');
    }
}
