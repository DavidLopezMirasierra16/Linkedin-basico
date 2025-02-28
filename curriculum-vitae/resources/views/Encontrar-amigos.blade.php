@extends('layouts.principal')

@section('title', 'Conecta con más gente')

@section('contenido')
    
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buscar perfiles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8 pb-6">
                <div class="p-6 text-gray-900">
                    <form action="{{route('buscar_perfil')}}" method="POST">
                        @csrf

                        <x-input-label for="" :value="__('Nombre de usuario')" />
                        <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" required/>
                        
                        <div class="mt-3">
                            <x-primary-button>{{ __('Buscar') }}</x-primary-button>
                        </div>
                    </form>
                </div>
                
                <div>
                    @if(isset($usuario_buscar))
                        @if($usuario_buscar->isEmpty())
                            <p class="ml-6">No se encontraron usuarios con el nombre: <b>{{$nombre}}</b></p>
                        @else
                            <p class="ml-6 text-xl">{{$usuario_buscar->count()}} resultados de búsqueda:</p>
                            @foreach($usuario_buscar as $usuario)
                                <div class="mt-6 p-3 mx-auto mt-2 sm:rounded-lg grid gap-2" style="background-color: #f3f4f6; width:85%; grid-template-columns: 1fr 1fr 1fr">
                                    <div class="mt-2 flex flex-row">
                                        <p class="font-bold">Nombre: </p> 
                                        <p class="ml-1">{{$usuario->nombre_completo}}</p>
                                    </div>
                                    <div class="mt-2 flex flex-row">
                                        <p class="font-bold">Profesion: </p> 
                                        <p class="ml-1">{{$usuario->profesion}}</p>
                                    </div>
                                    <div class="mt-2 flex flex-row">
                                        <a href="{{route('buscar_curriculum', str_replace(' ', '-', $usuario->nombre_completo))}}">
                                            <x-primary-button>{{ __('Visitar') }}</x-primary-button>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        @endif   
                    @endif
                </div>

            </div>
        </div>
    </div>


</x-app-layout>

@endsection