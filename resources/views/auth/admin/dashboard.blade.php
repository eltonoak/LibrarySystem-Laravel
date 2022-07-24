@extends('layouts.baseAuth')
@extends('layouts.app')
@section('content')
  @section('dashboard')
  <header class="font-semibold bg-[#F6F5F1] text-2xl text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
    Painel do Administrador
    {{-- {{$usuari->count(os)}} --}}
</header>

<div class="cards grid grid-cols-4 w-full h-full p-28 gap-6 text-white">
  <div class="w-full h-full text-center items-center">
    <div class="bg-[#966844] text-xl h-2/6 flex items-center justify-center">
      <h1 class="font-bold">Usuarios Registados</h1>
    </div>
    <div class="h-4/6 bg-[#DCD7C9] flex flex-col items-center justify-center">
      <p class="text-[#966844] text-6xl font-black">{{sizeOf($geral[0])}}</p>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
      </svg>
    </div>
  </div>
 
  <div class="w-full h-full text-center items-center">
    <div class="bg-[#966844] text-xl h-2/6 flex items-center justify-center">
      <h1 class="font-bold">Total de Livros</h1>
    </div>
    <div class="h-4/6 bg-[#DCD7C9] flex flex-col items-center justify-center">
      <p class="text-[#966844] text-6xl font-black">{{sizeOf($geral[1])}}</p>
         <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
      </svg>
    </div>
  </div>
  <div class="w-full h-full text-center items-center">
    <div class="bg-[#966844] text-xl h-2/6 flex items-center justify-center">
      <h1 class="font-bold">Autores existentes</h1>
    </div>
    <div class="h-4/6 bg-[#DCD7C9] flex flex-col items-center justify-center">
      <p class="text-[#966844] text-6xl font-black">{{sizeOf($geral[2])}}</p>
       <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
      </svg>
    </div>
  </div>

  <div class="w-full h-full text-center items-center">
    <div class="bg-[#966844] text-xl h-2/6 flex items-center justify-center">
      <h1 class="font-bold">Emprestimos</h1>
    </div>
    <div class="h-4/6 bg-[#DCD7C9] flex flex-col items-center justify-center">
      <p class="text-[#966844] text-6xl font-black">{{sizeOf($geral[3])}}</p>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
      </svg>
    </div>
  </div>
  
</div>
  @endsection
@endsection