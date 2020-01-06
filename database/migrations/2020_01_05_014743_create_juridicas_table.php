<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuridicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juridicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('razao_social');
            $table->string('cnpj');
            $table->string('cnpj');
            $table->string('endereco');
            $table->string('numero');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cep_end');
            $table->string('cidade');
            $table->string('uf_end');
            $table->string('end');
            $table->string('email');
            $table->string('tel_comercial');
            $table->string('celular');
            $table->string('responsavel');
            $table->string('cargo');
            $table->string('cpf');
            $table->string('termo');
            $table->string('senha');
            $table->string('remember_token');
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
        Schema::dropIfExists('juridicas');
    }
}
