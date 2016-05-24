<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Reclamacao as Reclamacao;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','cep','endereco'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function votos(){
      return $this->hasMany('App\Voto');
    }

    public function funcoes(){
        return $this->belongsToMany('App\Funcao', 'funcao_usuario', 'usuario_id', 'funcao_id');
    }

    public function punicoes(){
        return $this->belongsToMany('App\Punicao', 'usuario_punicao', 'usuario_id', 'punicao_id');
    }

    public function votoReclamacao($reclamacaoId){

        $voto = $this->votos()->where('reclamacao_id', $reclamacaoId)->first();
        if($voto)
            return $voto->positivo;
        else
            return "Nao Votou";


    }

    public function possuiFuncoes($funcoes){
        if(is_array($funcoes)){
            foreach ($funcoes as $funcao){
                if($this->possuiFuncao($funcao))
                    return true;
            }
        } else {
            if($this->possuiFuncao($funcoes))
                return true;
        }

        return false;
    }

    public function possuiFuncao($funcao){
        if($this->funcoes()->where('nome', $funcao)->first())
            return true;
        else
            return false;
    }


}
