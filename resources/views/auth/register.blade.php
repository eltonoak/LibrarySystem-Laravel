@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-full w-full">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Formulario de Registo') }}
                </header>

                @include('components.registerForm')

            </section>
        </div>
    </div>
</main>
@endsection