@extends('layouts.app')

@section('titulo')
    Empresas Receptoras
@endsection


@section('contenido')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Empresas Receptoras
        </h2>
        <div class="flex justify-end">
            <a href="{{ route('receptora.create') }}">
                <button
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                    <span>Agregar Empresa</span>
                </button>
            </a>
        </div>
        <br>
        <div class="w-full overflow-hidden ">
            <div class="w-full overflow-x-auto">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Nombre</th>
                            <th class="px-4 py-3">Dirección</th>
                            <th class="px-4 py-3">RFC</th>
                            <th class="px-4 py-3">Contacto</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @if (count($receptoras) > 0)
                            @foreach ($receptoras as $receptora)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div>
                                                <p class="font-semibold">{{ $receptora->id }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $receptora->nombre }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $receptora->direccion }}
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        {{ $receptora->rfc }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $receptora->contacto }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $receptora->email }}
                                    </td>
                                    <td>
                                        <a class="flex justify-center" href="{{route('receptora.eliminar',$receptora->id)}}">
                                            <svg style="color:red;" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3" colspan="6">
                                    <div class="flex justify-center text-sm">
                                        <div>
                                            <p class="font-semibold">No hay empresas receptoras</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
