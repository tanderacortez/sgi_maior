<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaProjetos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('projetos', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('id_cliente')->unsigned();
        $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
        $table->date('dataInicioContrato');
        $table->date('dataFimContrato');
        $table->date('novo_prazo_acordado')->nullable();
        $table->string('status');
        $table->string('status_motivo')->nullable();
        $table->string('etapa_dev')->nullable();
        $table->text('observacao')->nullable();
        $table->string('nome');
        $table->string('nivel_criticidade')->nullable();
        $table->string('tipo_recorrencia');
        $table->text('dados_gerencieme')->nullable();
        $table->text('dados_dominio')->nullable();
        $table->text('dados_painel')->nullable();
        $table->text('dados_ecommerce')->nullable();
        $table->text('dados_ftp')->nullable();
        $table->integer('excluido')->default('0');
        $table->timestamps();
    });
    }

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
