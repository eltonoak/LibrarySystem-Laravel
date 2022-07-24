<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_actualizados', function (Blueprint $table) {
            $table->id();
            $table->integer('id_actualizado');
            $table->string('nome_antes');
            $table->string('sobrenome_antes');
            $table->string('bi_antes');
            $table->string('genero_antes');
            $table->date('data_nascimento_antes');
            $table->string('nome_depois');
            $table->string('sobrenome_depois');
            $table->string('bi_depois');
            $table->string('genero_depois');
            $table->date('data_nascimento_depois');
            $table->unsignedBigInteger('conta_id');
            $table->timestamp('actualizado_aos');
        });
        Schema::create('usuarios_eliminados', function (Blueprint $table) {
            $table->id();
            $table->integer('id_eliminado');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('bi');
            $table->string('genero');
            $table->date('data_nascimento');
            $table->unsignedBigInteger('conta_id');
            $table->timestamp('eliminado_aos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_actualizados');
        Schema::dropIfExists('usuarios_eliminados');
    }
};
