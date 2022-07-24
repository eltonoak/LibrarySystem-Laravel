@extends('layouts.baseAuth')
@extends('layouts.app')
@section('content')
  @section('dashboard')
  <div class="flex flex-col justify-center w-full">
    <h2 class="p-1 text-2xl font-bold w-full text-left">Usuarios Registados</h2>
                  <div class="table-responsive w-full p-5 pt-2">
                      <table class="min-w-full table-auto mb-0.5" id="tabel">
                          <thead class="bg-white border-b">
                              <th class="text-sm font-bold text-gray-900 px-6 py-4 text-left">#</th>
                              <th class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Código</th>
                              <th class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Nome</th>
                              <th class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Sobrenome</th>
                              <th class="text-sm font-bold text-gray-900 px-6 py-4 text-left">Ações</th>
                          </thead>
                          <tbody>
                            @foreach ($usuarios as $usuario)
                              <tr class="border-b even:bg-[#DCD7C9] odd:bg-[#F6F5F1] hover:bg-[#DCD7C9] hover:text-white hover:cursor-pointer">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ ($usuarios->currentPage()-1) * $usuarios->perPage() + $loop->index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$usuario->id}} </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$usuario->nome}} </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$usuario->sobrenome}} </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 flex whitespace-nowrap"><a href='/usuarios/{{$usuario->id}}/edit' class='btn-sm btn-primary' data-bs-toggle="tooltip" title="Editar Usuario">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                              </a>
                                  @if (Auth::user()->usuario->id!=$usuario->id)
                                  <form action="/usuarios/{{$usuario->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="eliminar" data-bs-toggle="tooltip" title="Eliminar Usuario">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                  </button>
                                  </form>
                                  @endif
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                        <div>{{$usuarios->links('pagination::tailwind')}}</div>
                  </div>
  </div>
@endsection