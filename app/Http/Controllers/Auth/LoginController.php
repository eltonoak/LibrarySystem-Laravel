<?php

namespace App\Http\Controllers\Auth;

use App\Models\Autor;
use App\Models\Livro;
use App\Models\Usuario;
use App\Models\Emprestimo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'nome_usuario';
    }
    public function login(Request $request)
    {
        if (Auth::attempt(['nome_usuario' => $request->username, 'password' => $request->password])) {
            $usuario = Auth::user()->usuario;
            $usuarios = Usuario::all();
            // dd(Auth::user()->tipo_id);
            if (Auth::user()->tipo_id == 1) {
                $autores = Autor::all();
                $livros = Livro::all();
                $emprestimos = Emprestimo::all();
                return redirect('/home')->with(['usuario' => $usuario, 'geral' => [$usuarios, $livros, $autores, $emprestimos]]);
            } else {
                return redirect('/home')->with(['usuario' => $usuario]);
            }
        } else {
            return redirect()->back()->with('Erro', 'Dados invalidos');
        }
    }
}
