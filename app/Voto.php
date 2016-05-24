<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    public function usuario(){
      return $this->belongsTo('App\User');
    }

    public function reclamacao(){
      return $this->belongsTo('App\Reclamacao');
    }
}
