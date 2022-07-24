<?php

namespace Database\Seeders;

use App\Models\Tipo;
use App\Models\Conta;
use App\Models\Usuario;
use App\Models\Contacto;
use App\Models\Endereco;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tipo::create([
        //     'tipo' => 'Administrador'
        // ]);
        // Tipo::create([
        //     'tipo' => 'Normal'
        // ]);
        DB::table('tipos')->insert(['tipo' => 'Administrador']);
        DB::table('tipos')->insert(['tipo' => 'Normal']);
        $conta =  Conta::create([
            'nome_usuario' => 'admin',
            'password' => Hash::make('123456789'),
            'tipo_id' => 1,
        ]);
        $usuario = $conta->usuario()->create([
            'nome' => 'Admin',
            'sobrenome' => 'User',
            'bi' => "007085667be000",
            'genero' => 'Masculino',
            'data_nascimento' => '2000-07-24',
        ]);

        $usuario->contacto()->create([
            'telefone_principal' => '944320877',
            'telefone_alternativo' => '992146637',
            'email' => 'admin@admin.com'
        ]);

        $usuario->enderecos()->create([
            'municipio' => 'Viana',
            'bairro' => 'Kapalanca',
            'rua' => 'Kupatia',
            'casa' => 25
        ]);
        for ($i = 0; $i <= 29; $i++) {
            $conta =  Conta::create([
                'nome_usuario' => 'usuario' . $i,
                'password' => Hash::make('123456789'),
                'tipo_id' => 2,
            ]);
            $usuario = $conta->usuario()->create([
                'nome' => 'usuario' . $i,
                'sobrenome' => 'sobrenome',
                'bi' => "0123456749236" . $i,
                'genero' => 'Masculino',
                'data_nascimento' => '2000-04-' . $i + 1,
            ]);

            $usuario->contacto()->create([
                'telefone_principal' => '94432086' . $i,
                'telefone_alternativo' => '99214662' . $i,
                'email' => $usuario->nome . '@admin.com'

            ]);

            $usuario->enderecos()->create([
                'municipio' => 'Viana',
                'bairro' => 'Kapalanca',
                'rua' => 'Kupatia',
                'casa' => 25
            ]);
        }
    }
}
