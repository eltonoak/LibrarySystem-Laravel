<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $users = Usuario::all()->paginate(1);
        $users =  Usuario::paginate(7);
        return view('auth.admin.users.usuarios')->with('usuarios', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.admin.users.adicionar_usuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => ['required', 'string', 'max:255'],
            'sobrenome' => ['required', 'string', 'max:255'],
            'bi' => ['regex:/^$|^[0-9]{9}[a-zA-Z]{2}[0-9]{3}$/', 'unique:usuarios,bi'],
            'genero' => 'required',
            'dataNascimento' => ['required', 'date'],
            'telPrincipal' => ['required', 'digits:9', 'unique:contactos,telefone_principal'],
            'telAlternativo' => ['nullable', 'digits:9'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'municipio' => 'required',
            'bairro' => 'required',
            'nomeUsuario' => ['required', 'unique:contas,nome_usuario'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // $usuario = new Usuario();
        $conta =  Conta::create([
            'nome_usuario' => $request['nomeUsuario'],
            'password' => Hash::make($request['password']),
            'tipo_id' => 2,
        ]);
        $usuario = $conta->usuario()->create([
            'nome' => $request['nome'],
            'sobrenome' => $request['sobrenome'],
            'bi' => $request['bi'],
            'genero' => $request['genero'],
            'data_nascimento' => $request['dataNascimento'],
        ]);

        $usuario->contacto()->create([
            'telefone_principal' => $request['telPrincipal'],
            'telefone_alternativo' => $request['telAlternativo'],
            'email' => $request['email']

        ]);

        $usuario->enderecos()->create([
            'municipio' => $request['municipio'],
            'bairro' => $request['bairro'],
            'rua' => $request['rua'],
            'casa' => $request['casa']
        ]);
        if (Auth::user()) {
            return redirect('/usuarios')->with('sucesso', 'Usuario registado');
        }
        return redirect('/login')->with('sucesso', 'Usuario registado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $usuario = Usuario::find($id);
        return view('auth.admin.users.editar_usuario')->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view('auth.editar_perfil')->with(['conta' => $usuario->conta, 'usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'nome' => ['required', 'string', 'max:255'],
        //     'sobrenome' => ['required', 'string', 'max:255'],
        //     'bi' => ['regex:/^$|^[0-9]{9}[a-zA-Z]{2}[0-9]{3}$/', 'unique:usuarios,bi'],
        //     'genero' => 'required',
        //     'dataNascimento' => ['required', 'date'],
        //     'telPrincipal' => ['required', 'digits:9', 'unique:contactos,telefone_principal'],
        //     'telAlternativo' => ['nullable', 'digits:9'],
        //     'email' => ['nullable', 'string', 'email', 'max:255'],
        //     'municipio' => 'required',
        //     'bairro' => 'required',
        //     'nomeUsuario' => ['required', 'unique:contas,nome_usuario'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
        $pass = (strlen($request['password']) > 20) ? $request['password'] : Hash::make($request['password']);
        $tipo = ($request['tipo']) ? $request['tipo'] : 2;
        $usuario = Usuario::find($id);
        $usuario->conta->password = $pass;
        $usuario->conta->tipo_id = $tipo;
        $usuario->nome = $request['nome'];
        $usuario->sobrenome = $request['sobrenome'];
        $usuario->bi = $request['bi'];
        $usuario->genero = $request['genero'];
        $usuario->data_nascimento = $request['dataNascimento'];
        $usuario->contacto->telefone_principal = $request['telPrincipal'];
        $usuario->contacto->telefone_alternativo = $request['telAlternativo'];
        $usuario->contacto->email = $request['email'];
        $usuario->enderecos[0]->municipio = $request['municipio'];
        $usuario->enderecos[0]->bairro = $request['bairro'];
        $usuario->enderecos[0]->rua = $request['rua'];
        $usuario->enderecos[0]->casa = $request['casa'];
        // dd($conta->usuario->enderecos);
        return ($usuario->conta->save() && $usuario->save() &&
            $usuario->contacto->save() && $usuario->enderecos[0]->save())
            ? redirect('/usuarios')->with('sucesso', 'Usuario actualizado')
            : redirect('/usuarios')->back()->with('erro', 'Nao foi possivel actualizar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usuario::find($id)->emprestimos()->delete();
        Usuario::find($id)->delete();
        $usuarios = Usuario::all();
        return redirect('/usuarios')->with(['usuarios' => $usuarios, 'sucesso' => 'Usuario eliminado com sucesso!!!']);
    }
}
