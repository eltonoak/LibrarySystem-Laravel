<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Livro;
use App\Models\Usuario;
use App\Models\Emprestimo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuario = Auth::user()->usuario;
        $usuarios = Usuario::all();
        // dd($usuarios);
        if (Auth::user()->tipo_id == 1) {
            $autores = Autor::all();
            $livros = Livro::all();
            $emprestimos = Emprestimo::all();
            return view('auth.admin.dashboard')->with(['usuario' => $usuario, 'geral' => [$usuarios, $livros, $autores, $emprestimos]]);
        }
        return view('auth.user.dashboard')->with(['usuario' => $usuario, 'usuarios' => $usuarios]);
    }
}
