<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER usuarios_eliminados AFTER DELETE 
                        ON usuarios FOR EACH ROW
                        BEGIN
                        INSERT INTO usuarios_eliminados(id_eliminado, nome, sobrenome, bi, genero, data_nascimento, conta_id)
                        VALUES (OLD.id, OLD.nome, OLD.sobrenome, OLD.bi, OLD.genero, OLD.data_nascimento, OLD.conta_id);
                        END');
        DB::unprepared('CREATE TRIGGER usuarios_actualizados BEFORE UPDATE 
                        ON usuarios FOR EACH ROW
                        BEGIN
                        INSERT INTO usuarios_actualizados(id_actualizado, nome_antes, sobrenome_antes, bi_antes, genero_antes, data_nascimento_antes,
                                    nome_depois, sobrenome_depois, bi_depois, genero_depois, data_nascimento_depois, conta_id)
                        VALUES (OLD.id, OLD.nome, OLD.sobrenome, OLD.bi, OLD.genero, OLD.data_nascimento,
                                NEW.nome, NEW.sobrenome, NEW.bi, NEW.genero, NEW.data_nascimento, NEW.conta_id);
                        END');
        DB::unprepared('CREATE TRIGGER diminuir_copias_disponiveis AFTER INSERT 
                        ON emprestimo_livro FOR EACH ROW
                        BEGIN
                        UPDATE livros SET copias_disponiveis = copias_disponiveis - 1 WHERE id = NEW.livro_id;
                        END');
        DB::unprepared('CREATE TRIGGER aumentar_copias_disponiveis AFTER DELETE 
                        ON emprestimo_livro FOR EACH ROW
                        BEGIN
                        UPDATE livros SET copias_disponiveis = copias_disponiveis + 1 WHERE id = OLD.livro_id;
                        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER usuarios_eliminados');
        DB::unprepared('DROP TRIGGER usuarios_actualizados');
        DB::unprepared('DROP TRIGGER diminuir_copias_disponiveis');
        DB::unprepared('DROP TRIGGER aumentar_copias_disponiveis');
    }
};
