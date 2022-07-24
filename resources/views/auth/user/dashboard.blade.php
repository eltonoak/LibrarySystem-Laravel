@extends('layouts.baseAuth')
@extends('layouts.app')
@section('content')
  @section('dashboard')
    <div class="flex flex-col justify-center w-full">
      <h2 class="p-1 text-xl font-bold w-full text-center">Painel do Usuario</h2>
      {{-- {{dd($usuario->emprestimos)}} --}}
    <div class="hidden">{{$i=1;}}
    </div>
                    <div class="table-responsive w-full p-5 pt-2">
                        <table class="min-w-full table-auto mb-0.5" id="tabel">
                            <thead class="bg-white border-b">
                                <th class="text-sm font-bold text-gray-900 px-6 py-4 text-left">#</th>
                                <th class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Livro</th>
                                <th class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Autor</th>
                                <th class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Termino</th>
                                <th class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Estado</th>
                                <th class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Acoes</th>
                            </thead>
                            <tbody>
                              @foreach ($usuario->emprestimos as $emprestimo)
                                <tr class="border-b even:bg-gray-100 odd:bg-gray-300">
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $i++}} </td>
                                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><a href="/livros/{{$emprestimo->livros[0]->id}}">{{$emprestimo->livros[0]->titulo}}</a></td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{$emprestimo->livros[0]->autores[0]->sobrenome}} </td>
                                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$emprestimo->data_fim}} </td>
                                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$emprestimo->estado}} </td>
                                  <td class="text-sm text-gray-900 font-light px-6 py-4 flex justify-between whitespace-nowrap">
                                  @if ($emprestimo->estado=='Em curso')
                                  <form action="/devolver/{{$emprestimo->id}}" method="POST">
                                    @csrf
                                    <button type="submit" class="justify-self-end bg-blue-600 p-1 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out eliminar"
                                      data-bs-toggle="tooltip">
                                      Devolver Livro
                                    </button>
                                  </form>
                                  @elseif ($emprestimo->estado=='Devolvido')
                                  Nenhuma acao disponivel
                                  @else
                                  <form action="/devolver/{{$emprestimo->id}}" method="POST">
                                    @csrf
                                    <button type="submit" class="justify-self-end bg-[#966844] p-1 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-[#9e7352] hover:shadow-lg focus:bg-[#966844] focus:shadow-lg focus:outline-none focus:ring-0 active:bg-[#966844] active:shadow-lg transition duration-150 ease-in-out eliminar"
                                      data-bs-toggle="tooltip">
                                      Cancelar Emprestimo
                                    </button>
                                  </form>
                                  @endif
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
    </div>
@endsection
@endsection