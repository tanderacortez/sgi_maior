<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    //
    protected $fillable = [
        'id',
        'id_projeto',
        'id_executor',
        'id_responsavel',
        'titulo',
        'descricao',
        'imagem',
        'anexo',
        'etiqueta',
        'status',
        'data_entrega',
        'inicio_tarefa',
        'fim_tarefa',
        'obs',
        'aprovado_por',
        'data_hora_aprovacao',
        'excluido'
    ];

//Status:1 Em Andamento
//Status:2 Parado
//Status:3 Suspenso
//Status:4 Cancelado

//estapa_dev: 1 Planejamento
//estapa_dev: 2 Desenvolvimento
//estapa_dev: 3 Validação Interna
//estapa_dev: 4 Validação com o Cliente




    protected $table = 'tarefas';

    public function projetos()
    { //Traz a pessoa referente ao telefone
        return $this->belongsTo('App\Projeto', 'id_projeto', 'id');
    }

    // public function todos_clientes(){
    //    return (Clientes::all());
    //}
}