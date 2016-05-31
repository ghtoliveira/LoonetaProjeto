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

  public function tags(){
    return $this->belongsToMany('App\Tag', 'reclamacao_tag', 'reclamacao_id', 'tag_id');
  }

  public function status(){
    return $this->belongsTo('App\Status');
  }

}
