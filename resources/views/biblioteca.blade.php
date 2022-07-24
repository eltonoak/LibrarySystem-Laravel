@extends('layouts.app')
@section('content')
<div class="w-full h-screen bg-cover bg-center" style="background-image: url('{{asset('/img/normal.jpg')}}')">
 <div class="w-full h-full before bg-black bg-opacity-60 flex items-center justify-center">
   <div class="w-full h-fit p-10 flex flex-col justify-center items-center">
     <div class="texts">
       <h1 class="text-white text-4xl font-bold ">Sistema de Gestao de uma Biblioteca</h1>
       {{-- <p class="text-white text-xs font-medium "></p> --}}
       
     </div>
     <div class="mt-8 grid grid-cols-2 gap-8">
       <a href="/livros" class="text-center font-bold inline-block bg-white text-[#966844] px-8 py-4 rounded-xl border border-white text-sm leading-tight uppercase shadow-md hover:text-white hover:bg-[#966844] hover:shadow-lg focus:bg-[#966844] focus:shadow-lg focus:outline-none focus:ring-0 active:bg-[#966844] active:shadow-lg transition duration-150 ease-in-out">Ver Livros</a>
       <a href="/login" class=" text-center font-bold inline-block bg-white text-[#966844] px-8 py-4 rounded-xl border border-white text-sm leading-tight uppercase shadow-md hover:text-white hover:bg-[#966844] hover:shadow-lg focus:bg-[#966844] focus:shadow-lg focus:outline-none focus:ring-0 active:bg-[#966844] active:shadow-lg transition duration-150 ease-in-out">Entrar</a>
     </div>
   </div>
   {{-- <div class="sobre">
     Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt, voluptate cumque? Sapiente nobis quis ratione quidem laboriosam dolorem inventore culpa!
   </div> --}}
 </div>
</div>
  @endsection