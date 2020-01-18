<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInt('id_cliente');
            $table->enum('tipo_cliente');
            $table->string('endereco');
            $table->string('num_endereco');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cep_end');
            $table->string('cidade');
            $table->string('uf_end');
            $table->string('telefone');
            $table->string('responsavel');
            $table->enum('principal');
            $table->enum('sql_deleted');
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
        Schema::dropIfExists('entregas');
    }
}
