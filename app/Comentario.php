<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
  public function reclamacao(){
    return $this->belongsTo('App\Reclamacao');
  }

  public function usuario(){
    return $this->belongsTo('App\User');
  }

  public function isDenunciado($id){
    

  }
}
