<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interacao extends Model
{
    //
    protected $fillable = [
      'id',
      'user_id',
      'id_tarefa',
      'comentario',

    ];

    protected $table = 'interacoes';

    public function tarefas(){
        return $this->belongsTo('App\Tarefa', 'id_tarefa', 'id' );
    }
}


