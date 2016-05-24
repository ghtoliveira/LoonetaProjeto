<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reclamacao extends Model
{
  public function comentarios(){
    return $this->hasMany('App\Comentario');
  }

  public function usuario(){
    return $this->belongsTo('App\User');
  }

  public function votos(){
    return $this->hasMany('App\Voto');
  }
}
