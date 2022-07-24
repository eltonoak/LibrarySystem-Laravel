<div class="w-full h-full flex flex-col items-center">
  {{-- <h6 class="w-[60%] self-start">Informacoes sobre o livro</h6> --}}
  <div class="w-3/5 mt-4 p-3 bg-white grid grid-cols-12 grid-rows-12 gap-5">
    <h1 class="text-3xl font-bold col-span-12 row-span-1">{{Str::upper($livro->titulo)}}</h1>
      <img src="/storage/capas/{{$livro->capa}}" alt="Capa" class="w-full col-span-6 row-span-5">
    
        <div class="col-span-6 col-start-7 row-span-2">
          <p><span class="text-base font-bold ">Autor:</span> {{$livro->autores[0]->nome}}</p>
          <p><span class="text-base font-bold ">ISBN:</span> {{$livro->isbn}}</p>
          <p><span class="text-base font-bold ">Categoria:</span> {{$livro->categoria->categoria}}</p>
          <p><span class="text-base font-bold ">Editora:</span> {{$livro->editora->nome}}</p>
          <p><span class="text-base font-bold ">Edicao:</span> {{$livro->edicao}}</p>
          <p><span class="text-base font-bold ">Numero de Paginas:</span> {{$livro->paginas}}</p>
          <p><span class="text-base font-bold ">Copias emprestadas:</span> {{count($livro->emprestimos)}}</p>
          <p><span class="text-base font-bold ">Copias disponiveis:</span> {{$livro->copias_disponiveis}}</p>
        </div>
          <div class="col-span-6 col-start-7 row-span-2 grid grid-cols-2 grid-rows-2 gap-4">
            @if (Auth::check() && Auth::user()->tipo_id==1)
            <div class="w-full h-full flex items-center justify-center bg-gray-600 px-2 py-3 text-white align-middle font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out">
              <a href="/livros/{{$livro->id}}/edit">Editar</a></div>
            <form action="/livros/{{$livro->id}}" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="w-full h-full bg-red-600 px-2 py-3 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                Apagar Livro
            </button>
            </form>
            <form action="/livros/{{$livro->id}}/aumentar" method="POST">
              @csrf
              <button type="submit" class="w-full h-full bg-blue-600 px-2 py-3 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                Aumentar copias
            </button>
            </form>
            @else
            <form action="/emprestimos/{{$livro->id}}" method="POST">
              @csrf
              <button type="submit" class="w-full h-full bg-blue-600 px-2 py-3 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out eliminar"
                data-bs-toggle="tooltip" title="Eliminar emprestimo">
                Solicitar emprestimo
            </button>
            </form>
            @endif
          </div>
       
  
    
  </div>
</div>

