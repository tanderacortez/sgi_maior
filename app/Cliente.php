<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable =[
        'id',
        'nome_resp',
        'empresa',
        'email',
        'dddcel',
        'celular',
        'obs',
        'status_relacionamento',
        'atendimento'
    ];

//Status relacionamento
// 1:Estável
// 2:Precisando de atenção
// 3:Crítico
// 4:Ótimo

    protected $table = 'clientes';

    //Criando método para trazer os projetos na consulta
    public function projetos(){ //Traz o projeto relacionado ao cliente.
        return $this->hasMany(Projeto::class, 'id_cliente');

    }
}

