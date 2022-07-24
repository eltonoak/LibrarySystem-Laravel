<?php

namespace App\Http\Controllers\Auth;

use App\Models\Conta;
use App\Models\Usuario;
use App\Models\Contacto;
use App\Models\Endereco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'sobrenome' => ['required', 'string', 'max:255'],
            'bi' => ['regex:/^$|^[0-9]{9}[a-zA-Z]{2}[0-9]{3}$/', 'unique:usuarios,bi'],
            'telPrincipal' => ['unique:contactos,telefone_principal'],
            'email' => ['string', 'email', 'max:255'],
            'nomeUsuario' => ['unique:contas,nome_usuario'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Usuario
     */
    protected function create(array $data)
    {
        // // dd($usuario->id);
        // dd((int)$data['tipo']);
        $conta =  Conta::create([
            'nome_usuario' => $data['nomeUsuario'],
            'password' => Hash::make($data['password']),
            'tipo_id' => 2,
        ]);
        $usuario = $conta->usuario()->create([
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'bi' => $data['bi'],
            'genero' => $data['genero'],
            'data_nascimento' => $data['dataNascimento'],
        ]);

        $usuario->contacto()->create([
            'telefone_principal' => $data['telPrincipal'],
            'telefone_alternativo' => $data['telAlternativo'],
            'email' => $data['email']

        ]);

        $usuario->enderecos()->create([
            'municipio' => $data['municipio'],
            'bairro' => $data['bairro'],
            'rua' => $data['rua'],
            'casa' => $data['casa']
        ]);
        return $usuario;
    }
    // public function register(Request $request)
    // {
    //     $validator = $this->validator($request->all());

    //     if ($validator->fails()) {
    //         $this->throwValidationException(
    //             $request,
    //             $validator
    //         );
    //     }
    //     $this->create($request->all());
    //     return redirect(route('home'));
    // }
}
