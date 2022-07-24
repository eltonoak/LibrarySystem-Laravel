<main class="sm:w-full h-[90%] flex overflow-y-auto relative">
      @if (session('status'))
          <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
              {{ session('status') }}
          </div>
      @endif
          <section class="sidebar w-1/5 h-screen bg-[#F6F5F1] text-[#3F4E4F] flex-1">
            <div class="flex items-center justify-between px-8 pt-8">
              <svg class="h-[24px] w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>{{ Auth::check()?Auth::user()->nome_usuario: "Visitante" }}</span>
            </div>
            <div class="px-6 pt-4">
              <hr class="border-gray-700">
            </div>
            <div class="px-6 pt-4">
              <ul class="flex flex-col space-y-2">
              <li class="text-[#3F4E4F] flex justify-between items-center hover:text-[#966844] pl-2 {{request()->is('home')?'bg-[#DCD7C9]':''}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <a href="/home" class="inline-block w-full pl-8 pr-4 py-2 text-base hover:bg-[#DCD7C9] rounded">
                  Painel
                </a>
              </li>
              @if (Auth::check())
              <li class="text-[#3F4E4F] flex justify-between items-center hover:text-[#966844] pl-2 py-1 {{request()->is('usuarios/{usuario}/edit')?'bg-[#DCD7C9]':''}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                <a href="/{{(Auth::check())? "usuarios/".Auth::user()->usuario->id.'/edit' : ''}}" class="inline-block w-full pl-8 pr-4 py-2 text-base hover:bg-[#DCD7C9] rounded">
                  Editar Informacoes
                </a>
              </li>
              @endif
              @if (Auth::check() && Auth::user()->tipo_id==1)
              <li class="text-[#3F4E4F] flex justify-between align-middle items-center hover:text-[#966844] pl-2 py-1 {{request()->is('usuarios/create')?'bg-[#DCD7C9]':''}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                <a href="/usuarios/create" class="inline-block w-full pl-8 pr-4 py-2 text-base hover:bg-[#DCD7C9] rounded">
                  Adicionar Usuario
                </a>
              </li>
              <li class="text-[#3F4E4F] flex justify-between items-center hover:text-[#966844] pl-2 py-1 {{request()->is('usuarios')?'bg-[#DCD7C9]':''}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <a href="/usuarios" class="inline-block w-full pl-8 pr-4 py-2 text-base hover:bg-[#DCD7C9] rounded">
                  Listar Usuarios
                </a>
              </li>
              <li class="text-[#3F4E4F] flex justify-between items-center hover:text-[#966844] pl-2 py-1 {{request()->is('livros/create')?'bg-[#DCD7C9]':''}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <a href="/livros/create" class="inline-block w-full pl-8 pr-4 py-2 text-base hover:bg-[#DCD7C9] rounded">
                  Adicionar Livro
                </a>
              </li>
              @endif
              <li class="text-[#3F4E4F] flex justify-between items-center hover:text-[#966844] pl-2 py-1 {{request()->is('livros')?'bg-[#DCD7C9]':''}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <a href="/livros" class="inline-block w-full pl-8 pr-4 py-2 text-base hover:bg-[#DCD7C9] rounded">
                  Listar Livros
                </a>
              </li>
              @if (Auth::check() && Auth::user()->tipo_id==1)
              <li class="text-[#3F4E4F] flex justify-between items-center hover:text-[#966844] pl-2 py-1 {{request()->is('emprestimos')?'bg-[#DCD7C9]':''}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                </svg>
                <a href="/emprestimos" class="inline-block w-full pl-8 pr-4 py-2 text-base hover:bg-[#DCD7C9] rounded">
                  Emprestimos
                </a>
              </li>
              @endif
              </ul>
            </div>
          </section>
      <section class="flex w-4/5 flex-col h-full break-words sm:border-1 sm:rounded-md sm:shadow-sm">
        @include('components.messages')  
        @yield('dashboard')
      </section>
</main>
