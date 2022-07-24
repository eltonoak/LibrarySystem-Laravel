<?php

namespace Database\Seeders;

use App\Models\Autor;
use App\Models\Livro;
use App\Models\Editora;
use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LivrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $autor = Autor::create(['nome' => 'Fiodor', 'sobrenome' => 'Dostoievski']);
        $categoria = Categoria::create(['categoria' => 'Ficcao']);
        $editora = Editora::create(['nome' => 'Elorak']);
        $livro = Livro::create([
            'titulo' => 'Crime & Castigo',
            'capa' => 'zaratustra.jpg',
            'isbn' => '123456789',
            'categoria_id' => $categoria->id,
            'paginas' => '350',
            'edicao' => '1',
            'editora_id' => $editora->id
        ]);

        $livro->autores()->save($autor);

        $autor1 = Autor::create(['nome' => 'Friedrich', 'sobrenome' => 'Nietzsche']);
        $categoria = Categoria::create(['categoria' => 'Filosofia']);
        $editora = Editora::create(['nome' => 'Orlan']);
        $livro = Livro::create([
            'titulo' => '100 Aforismos Sobre Amor e Morte',
            'capa' => 'zaratustra.jpg',
            'isbn' => '1234567899',
            'categoria_id' => $categoria->id,
            'paginas' => '300',
            'edicao' => '4',
            'editora_id' => $editora->id
        ]);

        $livro->autores()->save($autor1);

        for ($i = 1; $i <= 30; $i++) {
            $categoria = Categoria::create(['categoria' => 'Literatura']);
            $editora = Editora::create(['nome' => 'Braun']);
            $livro = Livro::create([
                'titulo' => 'Assim Falou Zaratustra',
                'capa' => 'zaratustra.jpg',
                'isbn' => '1234567887' . $i,
                'categoria_id' => $categoria->id,
                'paginas' => '400',
                'edicao' => '2',
                'editora_id' => $editora->id
            ]);

            $livro->autores()->save($autor1);
        }
    }
}
