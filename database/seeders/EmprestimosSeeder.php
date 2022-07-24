<?php

namespace Database\Seeders;

use App\Models\Livro;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmprestimosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 1; $i <= 3; $i++) {
            $usuario = Usuario::find($i + 1);
            $livro = Livro::find($i);
            $emprestimo = $usuario->emprestimos()->create([
                'data_inicio' => now(),
                'data_fim' => '2022-07-0' . $i,
                'estado' => 'Pendente'
            ]);
            $livro->emprestimos()->save($emprestimo);
        }
    }
}
