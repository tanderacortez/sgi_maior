<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaTarefas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tarefas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_projeto')->unsigned();
            $table->foreign('id_projeto')->references('id')->on('projetos')->onDelete('cascade');
            $table->integer('id_responsavel')->unsigned();
            $table->foreign('id_responsavel')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_executor')->unsigned();
            $table->foreign('id_executor')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_criador')->unsigned();
            $table->foreign('id_criador')->references('id')->on('users')->onDelete('cascade');
            $table->string('titulo');
            $table->text('descricao');
            $table->string('imagem')->nullable();
            $table->string('anexo')->nullable();
            $table->string('etiqueta')->nullable();
            $table->integer('status')->default('0');
            $table->dateTime('data_entrega');
            $table->dateTime('inicio_tarefa')->nullable();
            $table->dateTime('fim_tarefa')->nullable();
            $table->text('obs')->nullable();
            $table->string('aprovado_por')->nullable();
            $table->dateTime('data_hora_aprovacao')->nullable();
            $table->integer('excluido')->default('0');
            $table->timestamps();
        });
    }

    /** campos não nulls
        Titulo
        Descricao
        Data de Entrega
     * Responsável
     * Executor
     *
     *
     *
    */
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
