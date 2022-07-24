<form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-1 pb-1" method="POST"
                    action="/usuarios">
                    @csrf

                    <fieldset class="w-full border border-solid border-gray-300 py-2 px-3 grid grid-cols-3 grid-rows-2 gap-2">
                        <legend>Dados Pessoais</legend>
                        <div class="flex flex-wrap col-span-2">
                            <label for="nome" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Nome') }}:
                            </label>
                            <input id="nome" type="text" class="form-input w-full p-1 rounded border border-gray-300 @error('nome')  border-red-500 @enderror"
                                name="nome" value="{{ old('nome') }}" autocomplete="nome" autofocus>
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
                            <input id="sobrenome" type="text" class="form-input w-full p-1 rounded border border-gray-300 @error('sobrenome')  border-red-500 @enderror"
                                name="sobrenome" value="{{ old('sobrenome') }}" required autocomplete="sobrenome">
                            @error('sobrenome')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="bi" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Bilhete de Identidade') }}:
                            </label>
                            <input id="bi" type="text" class="form-input w-full p-1 rounded border border-gray-300 @error('bi')  border-red-500 @enderror"
                                name="bi" value="{{ old('bi') }}" required autocomplete="bi">
                            @error('bi')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="genero" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Genero') }}:
                            </label>
                            <select name="genero" class="w-full p-1 rounded border border-gray-300 @error('genero')  border-red-500 @enderror"
                            name="genero">
                                <option value="">Selecionar....</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                            @error('genero')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="dataNascimento" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Data de Nascimento') }}:
                            </label>
                            <input id="dataNascimento" type="date" class="form-input w-full p-1 rounded border border-gray-300 @error('dataNascimento')  border-red-500 @enderror"
                                name="dataNascimento" value="{{ old('dataNascimento') }}" required>
                            @error('dataNascimento')
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
                                class="form-input w-full p-1 rounded border border-gray-300 @error('telPrincipal') border-red-500 @enderror" name="telPrincipal"
                                value="{{ old('telPrincipal') }}" required autocomplete="telPrincipal">
    
                            @error('telPrincipal')
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
                                class="form-input w-full p-1 rounded border border-gray-300 @error('telAlternativo') border-red-500 @enderror" name="telAlternativo"
                                value="{{ old('telAlternativo') }}" autocomplete="telAlternativo">
    
                            @error('telAlternativo')
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
                                value="{{ old('email') }}" autocomplete="email">
    
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
                            <select name = "municipio" class="form-input w-full p-1 rounded border border-gray-300 @error('municipio') border-red-500 @enderror">
                            <option value="">Selecionar....</option>
                            <option value="Belas">Belas</option>
                            <option value="Cacuaco">Cacuaco</option>
                            <option value="Cazenga">Cazenga</option>
                            <option value="Icolo e Bengo">Icolo e Bengo</option>
                            <option value="Luanda">Luanda</option>
                            <option value="Quiçama">Quiçama</option>
                            <option value="Kilamba Kiaxi">Kilamba Kiaxi</option>
                            <option value="Talatona">Talatona</option>
                            <option value="Viana">Viana</option>
                        </select>    
                            @error('municipio')
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
                                class="form-input w-full p-1 rounded border border-gray-300 @error('bairro') border-red-500 @enderror" name="bairro"
                                value="{{ old('bairro') }}" autocomplete="bairro">
    
                            @error('bairro')
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
                                class="form-input w-full p-1 rounded border border-gray-300" name="rua"
                                value="{{ old('rua') }}" autocomplete="rua">
                        </div>
                        <div class="flex flex-wrap">
                            <label for="casa" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Casa(Opcional)') }}:
                            </label>
    
                            <input id="casa" type="text"
                                class="form-input w-full p-1 rounded border border-gray-300" name="casa"
                                value="{{ old('casa') }}" autocomplete="casa">
                        </div>

                    </fieldset>
                   
                    <fieldset class="border border-solid border-gray-300 p-1 grid grid-cols-2 gap-2">
                        <legend>Dados da conta</legend>
                        <div class="flex flex-wrap">
                            <label for="nomeUsuario" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Nome de Usuario') }}:
                            </label>
    
                            <input id="nomeUsuario" type="text" class="form-input w-full p-1 rounded border border-gray-300 @error('nomeUsuario')  border-red-500 @enderror"
                                name="nomeUsuario" value="{{ old('nomeUsuario') }}" autocomplete="nomeUsuario">
    
                            @error('nomeUsuario')
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
                                    <select class="form-select w-full p-1 rounded border border-gray-300" name="tipo">
                                        <option value="0">Estudante</option>
                                        <option value="1">Administardor</option>
                                    </select> 
                                </div>
                            @endif
                        @endif
                        
                        <div class="flex flex-wrap">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Palavra-Passe') }}:
                            </label>
    
                            <input id="password" type="password"
                                class="form-input w-full p-1 rounded border border-gray-300 @error('password') border-red-500 @enderror" name="password"
                                autocomplete="new-password">
    
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
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
    
                    </fieldset>
                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-fit select-none font-bold whitespace-no-wrap px-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Registar') }}
                        </button>
                    </div>
                </form>