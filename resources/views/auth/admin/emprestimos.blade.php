@extends('layouts.baseAuth')
@extends('layouts.app')
@section('content')
  @section('dashboard')
  <div class="flex flex-col justify-center w-full relative">
    <h2 class="p-1 text-2xl font-bold w-full text-left">Emprestimos</h2>
  <div class="hidden">{{(request()->query('page'))?$index = request()->query('page')+count($emprestimos)-1:$index =1;}}
  </div>
  <form action="#" method="POST">
    <label for="estado">Filtrar:</label>
    <select name="estado" id="estado">
      <option value="Todos">Todos</option>
      <option value="Pendente">Pendente</option>
      <option value="Em Curso">Rejeitado</option>
      <option value="Em Curso">Em Curso</option>
    </select>
  </form>
                  <div class="table-responsive w-full p-5 pt-2">
                      <table class="min-w-full table-auto mb-0.5" id="tabel">
                          <thead class="bg-white border-b">
                              <th class="text-sm font-bold text-gray-900 px-6 py-4 text-left">#</th>
                              <th class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Usuario</th>
                              <th class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Livro</th>
                              <th class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Termino</th>
                              <th class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Estado</th>
                              <th class="text-sm font-bold text-gray-900 px-6 py-4 text-center">Acoes</th>
                          </thead>
                          <tbody>
                            @foreach ($emprestimos as $emprestimo)
                              <tr class="border-b even:bg-gray-100 odd:bg-gray-300">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ ($emprestimos->currentPage()-1) * $emprestimos->perPage() + $loop->index + 1 }} </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{$emprestimo->usuario->nome}} </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><a href="/livros/{{$emprestimo->livros[0]->id}}">{{$emprestimo->livros[0]->titulo}}</a></td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$emprestimo->data_fim}} </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$emprestimo->estado}} </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 flex justify-between whitespace-nowrap">
                                @if ($emprestimo->estado=='Pendente')
                                <form action="/aprovar/{{$emprestimo->id}}" method="POST">
                                  @csrf
                                  <button type="submit" class="justify-self-end bg-blue-600 p-1 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out eliminar"
                                    data-bs-toggle="tooltip" title="Eliminar emprestimo">
                                    Aprovar
                                </button>
                                </form>
                                <form action="/rejeitar/{{$emprestimo->id}}" method="POST">
                                    @csrf
                                    <button type="submit" class="justify-self-end bg-[#966844] p-1 text-white font-medium text-xs leading-tight uppercase rounded shadow-md focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out eliminar"
                                      data-bs-toggle="tooltip" title="Eliminar emprestimo">
                                      Rejeitar
                                  </button>
                                  </form>
                                @elseif ($emprestimo->estado=='Rejeitado')
                                <form action="/aprovar/{{$emprestimo->id}}" method="POST">
                                  @csrf
                                  <button type="submit" class="justify-self-end bg-blue-600 p-1 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out eliminar"
                                    data-bs-toggle="tooltip" title="Eliminar emprestimo">
                                    Aprovar
                                </button>
                                </form>
                                <form action="/emprestimos/{{$emprestimo->id}}" method="POST">
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit" class="justify-self-end bg-gray-500 p-1 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out eliminar"
                                    data-bs-toggle="tooltip" title="Eliminar emprestimo">
                                    Eliminar
                                </button>
                                </form>
                                @else
                                    <form action="/emprestimos/{{$emprestimo->id}}" method="POST">
                                      @method('DELETE')
                                      @csrf
                                      <button type="submit" class="justify-self-end bg-gray-500 p-1 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out eliminar"
                                        data-bs-toggle="tooltip" title="Eliminar emprestimo">
                                        Terminar
                                    </button>
                                    </form>
                                @endif
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                        {{$emprestimos->links('pagination::tailwind')}}
                  </div>
                  <a href="http://" class="absolute top-3 right-3 bg-blue-600 rounded-full transition-all ease-linear">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                  </svg></a>
  </div>
@endsection