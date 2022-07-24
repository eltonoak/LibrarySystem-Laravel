<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Usuario;
use App\Models\Emprestimo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmprestimoController extends Controller
{
    public function create($id)
    {
        $usuario = Auth::user()->usuario;
        $livro = Livro::find($id);
        if ($livro->copias_disponiveis == 0) {
            return redirect()->back()->with(['$usuario' => $usuario, 'erro' => 'Livro nao disponivel']);
        }
        if (count($usuario->emprestimos) >= 10) {
            return redirect()->back()->with(['$usuario' => $usuario, 'erro' => 'Ja atingiu o limite de emprestimos']);
        }
        $emprestimo = Emprestimo::create([
            'usuario_id' => $usuario->id,
            'data_inicio' => now(),
            'data_fim' => '2022-07-01',
        ]);

        $emprestimo->livros()->save($livro);

        return redirect('/home')->with(['usuario' => $usuario, 'sucesso' => 'Solicitacao enviada, aguarde a aprovacao']);
    }
    public function emprestimos()
    {
        $emprestimos = Emprestimo::paginate(7);
        return view('auth.admin.emprestimos')->with(['emprestimos' => $emprestimos]);
    }
    public function aprovarEmprestimo($id)
    {
        $emprestimo = Emprestimo::find($id);
        $emprestimo->estado = 'Em curso';
        $emprestimo->data_inicio = now();
        $emprestimo->data_fim = now()->addMonth(1);
        $emprestimo->save();

        $emprestimos = Emprestimo::paginate(7);
        return redirect('/emprestimos')->with(['emprestimos' => $emprestimos, 'sucesso' => 'Emprestimo Aprovado']);
    }
    public function rejeitarEmprestimo($id)
    {
        $emprestimo = Emprestimo::find($id);
        $emprestimo->estado = 'Rejeitado';
        $emprestimo->save();
        $emprestimos = Emprestimo::all();
        return redirect('/emprestimos')->with(['emprestimos' => $emprestimos, 'erro' => 'Emprestimo Rejeitado']);
    }
    public function destroy($id)
    {
        Emprestimo::find($id)->livros()->detach();
        Emprestimo::find($id)->delete();
        // $emprestimo->livros()->wherePivot('livro_id', '=', $id);
        $emprestimos = Emprestimo::all();
        return redirect('/emprestimos')->with(['emprestimos' => $emprestimos, 'sucesso' => 'Emprestimo Terminado']);
    }
    public function devolver($id)
    {
        $emprestimo = Emprestimo::find($id);
        $emprestimo->estado = "Devolvido";
        $emprestimo->save();

        return redirect('/home')->with(['sucesso' => 'Livro Devolvido']);
    }
}
