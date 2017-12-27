<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_resp');
            $table->string('empresa');
            $table->string('email');
            $table->string('dddcel')->nullable();
            $table->string('celular')->nullable();
            $table->string('status_relacionamento');
            $table->string('obs')->nullable();
            $table->string('atendimento')->nullable();
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
