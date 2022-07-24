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
        Schema::table('usuarios', function (Blueprint $table) {
            // Foreign Keys
            $table->foreign('conta_id')->references('id')->on('contas')->onDelete('cascade');
        });
        Schema::table('contactos', function (Blueprint $table) {
            // Foreign Keys
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
        Schema::table('enderecos', function (Blueprint $table) {
            // Foreign Keys
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
        Schema::table('livros', function (Blueprint $table) {
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('editora_id')->references('id')->on('editoras')->onDelete('cascade');
        });
        Schema::table('contas', function (Blueprint $table) {
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');
        });
        Schema::table('emprestimos', function (Blueprint $table) {
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
        Schema::table('emprestimo_livro', function (Blueprint $table) {
            $table->foreign('emprestimo_id')->references('id')->on('emprestimos')->onDelete('cascade');
            $table->foreign('livro_id')->references('id')->on('livros')->onDelete('cascade');
        });
        Schema::table('autor_livro', function (Blueprint $table) {
            $table->foreign('autor_id')->references('id')->on('autores')->onDelete('cascade');
            $table->foreign('livro_id')->references('id')->on('livros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables_relationships');
    }
};
