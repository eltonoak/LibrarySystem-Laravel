<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Livro;
use App\Models\Editora;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LivroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros =  Livro::paginate(12);
        return view('auth.admin.books.livros')->with('livros', $livros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.admin.books.adicionar_livro');
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
            'titulo' => 'required|string',
            'capa' => 'nullable|max:1999'
        ]);

        if ($request->hasFile('capa')) {
            $filenameWithExt = $request->file('capa')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext =  $request->file('capa')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $ext;
            $path = $request->file('capa')->storeAs('public/capas', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $autor = Autor::create([
            'nome' => 'Elton',
            'sobrenome' => 'Pessoa'
        ]);
        $categoria = Categoria::create(['categoria' => $request->categoria]);
        $editora = Editora::create(['nome' => $request->editora]);
        $livro = Livro::create([
            'titulo' => $request->titulo,
            'capa' => $fileNameToStore,
            'isbn' => $request->isbn,
            'categoria_id' => $categoria->id,
            'paginas' => (int)$request->paginas,
            'edicao' => (int)$request->edicao,
            'editora_id' => $editora->id,
            'copias_disponiveis' => (int)$request->copias
        ]);
        $livro->autores()->save($autor);
        $livros =  Livro::paginate(12);
        return redirect('/livros')->with(['livros' => $livros, 'sucesso' => 'O livro foi adicionado']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livro = Livro::find($id);

        return view('auth.admin.books.livro')->with(['livro' => $livro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livro = Livro::find($id);

        return view('auth.admin.books.editar_livro')->with(['livro' => $livro]);
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
        $this->validate($request, [
            'titulo' => 'required|string',
            'capa' => 'nullable|max:1999'
        ]);

        if ($request->hasFile('capa')) {
            $filenameWithExt = $request->file('capa')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext =  $request->file('capa')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $ext;
            $path = $request->file('capa')->storeAs('public/capas', $fileNameToStore);
        }
        $livro = Livro::find($id);
        $livro->titulo = $request->titulo;
        if ($request->hasFile('capa')) {
            $livro->capa = $fileNameToStore;
        }
        $livro->isbn = $request->isbn;
        $livro->categoria->categoria = $request->categoria;
        $livro->paginas = (int)$request->paginas;
        $livro->edicao = (int)$request->edicao;
        $livro->autores[0]->nome = $request->autor;
        $livro->editora->nome = $request->editora;
        $livro->copias_disponiveis = (int)$request->copias;
        $livro->save();
        $livro->categoria->save();
        $livro->editora->save();
        $livro->autores[0]->save();

        $livros =  Livro::paginate(12);
        return redirect("/livros/$livro->id")->with(['livros' => $livros, 'sucesso' => 'O livro foi actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Livro::find($id)->emprestimos()->delete();
        Livro::find($id)->delete();
        $livros = Livro::all();
        return redirect('/livros')->with(['livros' => $livros, 'sucesso' => 'Livro eliminado com sucesso!!!']);
    }
    public function aumentar($id)
    {
        DB::unprepared("CALL aumentar_copias($id)");
        $livro = Livro::find($id);

        return view('auth.admin.books.livro')->with(['livro' => $livro]);
    }
}
