@extends('layouts.baseAuth')
@extends('layouts.app')
@section('content')
  @section('dashboard')
<main class="sm:container sm:mx-auto sm:max-w-full w-full h-full">
    <div class="flex">
        <div class="w-full">
            <section class="flex h-full flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Adicionar Novo Livro') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8 grid grid-cols-3 gap-2 py-5" method="POST"
                    action="/livros/{{$livro->id}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                        <div class="flex flex-wrap">
                            <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Titulo') }}:
                            </label>
                            <input id="titulo" type="text" class="form-input w-full p-1 rounded border border-gray-300 @error('titulo')  border-red-500 @enderror"
                                name="titulo" value="{{ $livro->titulo }}" autocomplete="titulo" autofocus>
                            @error('titulo')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                          <label for="capa" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                              {{ __('Imagem da Capa') }}:
                          </label>
                          <input type="file" name="capa" id="capa"  class="form-input w-full p-1 rounded border border-gray-300 @error('capa')  border-red-500 @enderror">
                          @error('titulo')
                          <p class="text-red-500 text-xs italic mt-4">
                              {{ $message }}
                          </p>
                          @enderror
                      </div>
                        <div class="flex flex-wrap">
                            <label for="isbn" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('ISBN') }}:
                            </label>
                            <input id="isbn" type="text" class="form-input w-full p-1 rounded border border-gray-300 @error('name')  border-red-500 @enderror"
                                name="isbn" value="{{$livro->isbn }}" required autocomplete="isbn">
                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="categoria" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Categoria') }}:
                            </label>
                            <input id="categoria" type="text" class="form-input w-full p-1 rounded border border-gray-300 @error('name')  border-red-500 @enderror"
                                name="categoria" value="{{ $livro->categoria->categoria }}" required autocomplete="categoria">
                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="paginas" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Numero de Paginas') }}:
                            </label>
                            <input id="paginas" type="text" class="form-input w-full p-1 rounded border border-gray-300 @error('name')  border-red-500 @enderror"
                                name="paginas" value="{{ $livro->paginas }}" required autocomplete="paginas">
      
                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                          <label for="autor" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                              {{ __('Nome do Autor') }}:
                          </label>
                          <input id="autor" type="text" class="form-input w-full p-1 rounded border border-gray-300 @error('titulo')  border-red-500 @enderror"
                              name="autor" value="{{ $livro->autores[0]->nome.' '.$livro->autores[0]->sobrenome }}" autocomplete="autor">
                          @error('titulo')
                          <p class="text-red-500 text-xs italic mt-4">
                              {{ $message }}
                          </p>
                          @enderror
                      </div>
                        <div class="flex flex-wrap">
                            <label for="editora" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Editora') }}:
                            </label>
                            <input id="editora" type="text" class="form-input w-full p-1 rounded border border-gray-300 @error('name')  border-red-500 @enderror"
                                name="editora" value="{{ $livro->editora->nome }}" required>
                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                          <label for="edicao" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                              {{ __('Edicao') }}:
                          </label>
                          <input id="edicao" type="number" class="form-input w-full p-1 rounded border border-gray-300 @error('titulo')  border-red-500 @enderror"
                              name="edicao" value="{{ $livro->edicao }}" autocomplete="edicao">
                          @error('titulo')
                          <p class="text-red-500 text-xs italic mt-4">
                              {{ $message }}
                          </p>
                          @enderror
                      </div>
                      <div class="flex flex-wrap">
                        <label for="copias" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Numero de Copias Disponiveis') }}:
                        </label>
                        <input id="copias" type="number" class="form-input w-full p-1 rounded border border-gray-300 @error('titulo')  border-red-500 @enderror"
                            name="copias" value="{{ $livro->copias_disponiveis }}">
                        @error('titulo')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap grid grid-cols-3 row-start-4">
                        <button type="submit"
                            class="w-full select-none col-span-1 font-bold whitespace-no-wrap rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Guardar') }}
                        </button>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection