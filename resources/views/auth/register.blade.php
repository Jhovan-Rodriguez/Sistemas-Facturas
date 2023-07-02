@extends('layouts.authLayout')

@section('titulo')
    Register
@endsection

@section('contenido')
    <div class="w-full px-4 py-12 sm:px-6 sm:py-16 lg:w-1/2 lg:px-8 lg:py-24">
        <div class="mx-auto max-w-lg text-center">
            <h1 class="text-2xl font-bold sm:text-3xl">Registrate!</h1>

            <p class="mt-4 text-gray-500">
                Añade empresas y proporciona facturas en un solo lugar!
            </p>
            <p class="mt-4 text-gray-500">  
                Empieza ya!
            </p>
        </div>

        <form action="{{route('register')}}" method="POST" class="mx-auto mb-0 mt-8 max-w-md space-y-4">
            @csrf
            <div>
                <label for="nombre" class="sr-only">Nombre</label>
                <div class="relative">
                    <input name="nombre" type="text" class="w-full rounded-lg border-gray-600 p-4 pe-12 text-sm shadow-sm"
                        placeholder="Nombre" />
                </div>
            </div>
            <div>
                <label for="username" class="sr-only">Username</label>
                <div class="relative">
                    <input name="username" type="text" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                        placeholder="Username" />
                </div>
            </div>
            <div>
                <label for="email" class="sr-only">Email</label>
                <div class="relative">
                    <input name="email" type="email" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                        placeholder="Email" />
                </div>
            </div>
            <div>
                <label for="password" class="sr-only">Password</label>
                <div class="relative">
                    <input name="password" type="password" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                        placeholder="Password" />
                </div>
            </div>
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-500">
                     Ya tienes cuenta?
                    <a class="underline" href="{{ route('login') }}">Inicia sesión</a>
                </p>

                <button type="submit" class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
                    Sign in
                </button>
            </div>
        </form>
    </div>

    <div class="relative h-64 w-full sm:h-96 lg:h-full lg:w-1/2">
        <img alt="Welcome"
            src="https://images.unsplash.com/photo-1628348068343-c6a848d2b6dd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
            class="absolute inset-0 h-full w-full object-cover" />
    </div>
@endsection
