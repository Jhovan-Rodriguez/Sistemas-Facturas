@extends('layouts.app')

@section('titulo')
    Agregar factura
@endsection

<!-- Agrega el elemento a la stack en app.blade.php -->
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush


@section('contenido')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Agregar Factura
        </h2>
        <div class="md:flex md:items-center">
            <div class="md:w-1/4 px-5">
                <form action="{{ route('archivos.pdf') }}" method="POST" enctype="multipart/form-data" id="dropzonePDF"
                    class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                    @csrf

                </form>
            </div>
            <div class="md:w-1/4 px-5">
                <form action="{{ route('archivos.xml') }}" method="POST" enctype="multipart/form-data" id="dropzoneXML"
                    class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                    @csrf
                </form>
            </div>
            <div class="md:w-1/2 px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form method="post" action="" novalidate>
                    @csrf
                    <label class="block text-sm">
                        @error('emisora')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{ $message }}
                            </p>
                        @enderror
                        <span class="text-gray-700 dark:text-gray-400">Empresa emisora</span>
                        <!-- focus-within sets the color for the icon when input is focused -->
                        <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                            <select name="emisora"
                                class="block w-full mt-1 text-sm dark:text-gray-700 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                @if (count($emisoras) > 0)
                                    <option value="">Seleccione una empresa emisora</option>
                                    @foreach ($emisoras as $emisora)
                                        <option value="{{ $emisora->id }}">{{ $emisora->nombre }}</option>
                                    @endforeach
                                @else
                                    <option value="">No hay empresas emisoras</option>
                                @endif
                            </select>
                        </div>
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Empresa receptora</span>
                        <!-- focus-within sets the color for the icon when input is focused -->
                        @error('receptora')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{ $message }}
                            </p>
                        @enderror
                        <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                            <select name="receptora"
                                class="block w-full mt-1 text-sm dark:text-gray-700 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                @if (count($receptoras) > 0)
                                    <option value="">Seleccione una empresa receptora</option>
                                    @foreach ($receptoras as $receptora)
                                        <option value="{{ $receptora->id }}">{{ $receptora->nombre }}</option>
                                    @endforeach
                                @else
                                    <option value="">No hay empresas emisoras</option>
                                @endif
                            </select>
                        </div>
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Folio de factura</span>
                        @error('folio')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{ $message }}
                            </p>
                        @enderror
                        <!-- focus-within sets the color for the icon when input is focused -->
                        <div class="relative text-gray-600 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                            <input name="folio" value="{{ old('folio') }}"
                                class="block w-full pr-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                placeholder="Ingrese RFC de empresa receptora" />
                            <div class="absolute inset-y-0 right-0 flex items-center mr-3 pointer-events-none">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </label>
                    <div class="mt-4">
                        <input name="pdf" type="hidden" value="{{ old('pdf') }}">
                        @error('pdf')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <input name="xml" type="hidden" value="{{ old('xml') }}">
                        @error('xml')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <br>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                            </svg>
                            <span>Agregar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
