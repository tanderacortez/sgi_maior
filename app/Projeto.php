<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    //
    protected $fillable = [
        'id',
        'id_cliente',
        'dataInicioContrato',
        'dataFimContrato',
        'novo_prazo_acordado',
        'status',
        'status_motivo',
        'etapa_dev',
        'observacao',
        'tipo_recorrencia',
        'nome',
        'nivel_criticidade',
        'dados_gerencieme',
        'dados_dominio',
        'dados_painel',
        'dados_ecommerce',
        'dados_ftp',
        'excluido',
        'tipoProjeto'
    ];

//Status:1 Em Andamento
//Status:2 Parado
//Status:3 Suspenso
//Status:4 Cancelado

//estapa_dev: 1 Planejamento
//estapa_dev: 2 Desenvolvimento
//estapa_dev: 3 Validação Interna
//estapa_dev: 4 Validação com o Cliente


    protected $table = 'projetos';

    public function clientes()
    { //Traz a pessoa referente ao telefone
        return $this->belongsTo('App\Cliente', 'id_cliente', 'id');
    }

    // public function todos_clientes(){
    //    return (Clientes::all());
    //}
}


