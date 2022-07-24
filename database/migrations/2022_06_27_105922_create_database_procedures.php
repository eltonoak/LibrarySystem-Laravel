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
        DB::unprepared('DROP PROCEDURE IF EXISTS aumentar_copias');
        DB::unprepared('CREATE PROCEDURE aumentar_copias(IN livro_id INT) 
        BEGIN
        UPDATE livros SET copias_disponiveis = copias_disponiveis + 1 WHERE id = livro_id;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE aumentar_copias');
    }
};
