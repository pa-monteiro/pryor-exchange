<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFisicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fisicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_completo');
            $table->string('cpf');
            $table->string('ident_numero');
            $table->string('data_nascimento');
            $table->enum('sexo');
            $table->string('profissao');
            $table->string('nome_mae');
            $table->string('tipoendereco');
            $table->string('cep');
            $table->string('endereco');
            $table->string('numero_end');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf_end');
            $table->string('email');
            $table->string('telefonefixo');
            $table->string('celular');
            $table->string('senha');
            $table->string('conheceu');
            $table->string('checkrecebernovidades');
            $table->string('checktermoscondicoes');
            $table->string('remember_tock');
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
        Schema::dropIfExists('fisicas');
    }
}
