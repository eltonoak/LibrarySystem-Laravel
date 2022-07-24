@extends('layouts.baseAuth')
@extends('layouts.app')
@section('content')
  @section('dashboard')
<main class="sm:container sm:mx-auto sm:max-w-full w-full">
        <div class="flex w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Editar Usuario') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-1 pb-1" method="POST"
                    action="/usuarios/{{$usuario->id}}">
                    @method('PUT')
                    @csrf

                    <fieldset class="w-full border border-solid border-gray-300 py-2 px-3 grid grid-cols-3 grid-rows-2 gap-2">
                        <legend>Dados Pessoais</legend>
                        <div class="flex flex-wrap col-span-2">
                            <label for="nome" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Nome') }}:
                            </label>
                            <input id="nome" type="text" class="form-input w-full p-1 rounded border border-gray-300 @error('nome')  border-red-500 @enderror"
                                name="nome" value="{{ $usuario->nome }}" autocomplete="nome" autofocus>
                            @error('nome')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="sobrename" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Sobrenome') }}:
                            </label>
                            <input id="sobrenome" type="text" class="form-input w-full p-1 rounded border border-gray-300 @error('name')  border-red-500 @enderror"
                                name="sobrenome" value="{{ $usuario->sobrenome }}" required autocomplete="sobrenome">
                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="bi" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Bilhete de Identidade') }}:
                            </label>
                            <input id="bi" type="text" class="form-input w-full p-1 rounded border border-gray-300 @error('name')  border-red-500 @enderror"
                                name="bi" value="{{ $usuario->bi }}" required autocomplete="bi">
                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="genero" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Genero') }}:
                            </label>
                            <select name="genero" class="w-full p-1 rounded border border-gray-300 @error('name')  border-red-500 @enderror"
                            name="genero">
                                <option value="Select" {{($usuario->genero=="Select")?"selected":''}}>Selecionar....</option>
                                <option value="Masculino" {{($usuario->genero=="Masculino")?"selected":''}}>Masculino</option>
                                <option value="Feminino" {{($usuario->genero=="Feminino")?"selected":''}}>Feminino</option>
                            </select>
                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="dataNascimento" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Data de Nascimento') }}:
                            </label>
                            <input id="dataNascimento" type="date" class="form-input w-full p-1 rounded border border-gray-300 @error('name')  border-red-500 @enderror"
                                name="dataNascimento" value="{{ $usuario->data_nascimento }}" required>
                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </fieldset>

                    <fieldset class="border border-solid border-gray-300 p-1 grid grid-cols-3 gap-2">
                        <legend>Contactos</legend>
                        <div class="flex flex-wrap">
                            <label for="telPrincipal" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Telefone Principal') }}:
                            </label>
    
                            <input id="telPrincipal" type="tel"
                                class="form-input w-full p-1 rounded border border-gray-300 @error('email') border-red-500 @enderror" name="telPrincipal"
                                value="{{ $usuario->contacto->telefone_principal }}" required autocomplete="telPrincipal">
    
                            @error('email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="telAlternativo" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Telefone Alternativo(Opcional)') }}:
                            </label>
    
                            <input id="telAlternativo" type="tel"
                                class="form-input w-full p-1 rounded border border-gray-300 @error('email') border-red-500 @enderror" name="telAlternativo"
                                value="{{ $usuario->contacto->telefone_alternativo }}" autocomplete="telAlternativo">
    
                            @error('email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Endereço de E-Mail(Opcional)') }}:
                            </label>
    
                            <input id="email" type="email"
                                class="form-input w-full p-1 rounded border border-gray-300 @error('email') border-red-500 @enderror" name="email"
                                value="{{ $usuario->contacto->email }}" autocomplete="email">
    
                            @error('email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                    </fieldset>
                    <fieldset class="border border-solid border-gray-300 p-1 grid grid-cols-4 gap-2">
                        <legend>Endereco</legend>
                        <div class="flex flex-wrap">
                            <label for="municipio" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Municipio') }}:
                            </label>
                            <select name = "municipio" class="form-input w-full p-1 rounded border border-gray-300 @error('email') border-red-500 @enderror" required>
                            <option value="Select" >Selecionar....</option>
                            <option value="Belas" {{($usuario->enderecos[0]->municipio=="Belas")?"selected":''}}>Belas</option>
                            <option value="Cacuaco" {{($usuario->enderecos[0]->municipio=="Cacuaco")?"selected":''}}>Cacuaco</option>
                            <option value="Cazenga" {{($usuario->enderecos[0]->municipio=="Cazenga")?"selected":''}}>Cazenga</option>
                            <option value="Icolo e Bengo" {{($usuario->enderecos[0]->municipio=="Icolo e Bengo")?"selected":''}}>Icolo e Bengo</option>
                            <option value="Luanda" {{($usuario->enderecos[0]->municipio=="Luanda")?"selected":''}}>Luanda</option>
                            <option value="Quiçama" {{($usuario->enderecos[0]->municipio=="Quiçama")?"selected":''}}>Quiçama</option>
                            <option value="Kilamba Kiaxi" {{($usuario->enderecos[0]->municipio=="Kilamba Kiaxi")?"selected":''}}>Kilamba Kiaxi</option>
                            <option value="Talatona" {{($usuario->enderecos[0]->municipio=="Talatona")?"selected":''}}>Talatona</option>
                            <option value="Viana" {{($usuario->enderecos[0]->municipio=="Belas")?"selected":''}}>Viana</option>
                        </select>    
                            @error('email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="bairro" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Bairro') }}:
                            </label>
    
                            <input id="bairro" type="text"
                                class="form-input w-full p-1 rounded border border-gray-300 @error('email') border-red-500 @enderror" name="bairro"
                                value="{{ $usuario->enderecos[0]->bairro }}" required autocomplete="bairro">
    
                            @error('email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="rua" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Rua(Opcional)') }}:
                            </label>
    
                            <input id="rua" type="text"
                                class="form-input w-full p-1 rounded border border-gray-300 @error('email') border-red-500 @enderror" name="rua"
                                value="{{ $usuario->enderecos[0]->rua }}" autocomplete="rua">
    
                            @error('email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="casa" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Casa(Opcional)') }}:
                            </label>
    
                            <input id="casa" type="text"
                                class="form-input w-full p-1 rounded border border-gray-300 @error('email') border-red-500 @enderror" name="casa"
                                value="{{ $usuario->enderecos[0]->casa }}" autocomplete="casa">
    
                            @error('email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                    </fieldset>
                   
                    <fieldset class="border border-solid border-gray-300 p-1 grid grid-cols-2 gap-2">
                        <legend>Dados da conta</legend>
                        <div class="flex flex-wrap">
                            <label for="nomeUsuario" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Nome de Usuario') }}:
                            </label>
    
                            <input id="nomeUsuario" type="text" class="form-input w-full p-1 rounded border border-gray-300 @error('name')  border-red-500 @enderror"
                                name="nomeUsuario" value="{{ $conta->nome_usuario }}" required autocomplete="nomeUsuario">
    
                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        @if (Auth::user())
                            @if (Auth::user()->tipo_id==1)
                                <div class="flex flex-wrap">
                                    <label for="tipoConta" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                        {{ __('Registar como') }}:
                                    </label>
                                    <select class="form-select w-full p-1 rounded border border-gray-300 @error('email') border-red-500 @enderror" name="tipo">
                                        <option value="2" {{($conta->id_tipo == 2)?"selected":''}}>Estudante</option>
                                        <option value="1"{{($conta->id_tipo == 1)?"selected":''}}>Administardor</option>
                                    </select> 
                                
                                    @error('email')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            @endif
                        @endif
                        
                        <div class="flex flex-wrap">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Palavra-Passe') }}:
                            </label>
    
                            <input id="password" type="password"
                                class="form-input w-full p-1 rounded border border-gray-300 @error('password') border-red-500 @enderror" name="password"
                                value="{{$conta->password}}" required autocomplete="new-password">
    
                            @error('password')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
    
                        <div class="flex flex-wrap">
                            <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Confirmar Palavra-Passe') }}:
                            </label>
    
                            <input id="password-confirm" type="password" class="form-input w-full p-1 rounded border border-gray-300"
                                name="password_confirmation"value="{{$conta->password}}" required autocomplete="new-password">
                        </div>
    
                    </fieldset>
                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-fit select-none font-bold whitespace-no-wrap px-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Guardar') }}
                        </button>
                    </div>
                </form>

            </section>
        </div>
</main>
@endsection