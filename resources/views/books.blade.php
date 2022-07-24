<h1 class="text-2xl font-bold">Listar Livros</h1>
  {{-- <div class="container my-12 mx-auto px-4 md:px-12"> --}}
    <div class="grid grid-cols-6 gap-2 w-full p-2">
      @foreach ($livros as $livro )
      <div class="flex h-[300px] flex-col rounded-lg shadow-lg overflow-hidden col-span-1 relative">
        <a href="/livros/{{$livro->id}}" class="w-full h-[250px]">
          <img class="rounded-t-lg w-full h-full" src="/storage/capas/{{$livro->capa}}" alt="{{$livro->capa}}"/>
        </a>
        @if ($livro->copias_disponiveis>0)
        <span class="text-white absolute top-1 right-1 bg-blue-400 rounded p-1 text-xs font-bold">Disponivel</span>
      @else
      <span class="text-white absolute top-1 right-1 bg-red-400 rounded p-1 text-xs font-bold">Indisponivel</span>
      @endif
        <div class="h-2/5 absolute bottom-0 left-0 w-full bg-[#DCD7C9] flex flex-col items-center rounded-b-lg p-1">
          <h5 class="h-1/3 text-black text-sm font-bold mb-1 text-center">{{$livro->titulo}}</h5>
          <p class="h-1/3 text-black text-xs mb-2">
            <span class="font-bold text-white">Autor:</span> 
            @foreach ($livro->autores as $autor)
            {{$autor->nome.' '.$autor->sobrenome}}
            @endforeach
            
          </p>
          <a href="/livros/{{$livro->id}}" class="justify-self-end bg-[#966844] p-1 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-[#72523a]  hover:shadow-lg focus:bg-[#72523a]  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-[#72523a]  active:shadow-lg transition duration-150 ease-in-out">
            Ver Livro
          </a>
        </div>
      </div>
    @endforeach
</div>
<div>{{$livros->links('pagination::tailwind')}}</div>