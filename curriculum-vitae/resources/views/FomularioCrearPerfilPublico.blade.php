@extends('layouts.principal')

@section('title', 'Crear perfil publico')

@section('contenido')

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil público') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- DATOS PERFIL PUBLICO --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900">
                    
                    <h1>Datos Personales</h1>
                    <form action="{{route('crear_publico')}}" method="POST" class="mt-6 space-y-6">
                        @csrf

                        <div class="grid gap-4" style="grid-template-columns: 1fr 1fr">
                            <div class="mb-3">
                                <x-input-label for="" :value="__('Nombre completo')" />
                                <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" required/>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="" :value="__('Profesion')" />
                                <x-text-input id="profesion" name="profesion" type="text" class="mt-1 block w-full" required/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-input-label for="" :value="__('Descripcion breve')" />
                            <x-text-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full"/>
                        </div>
                        <div class="grid gap-4" style="grid-template-columns: 1fr 1fr">
                            <div>
                                <x-input-label for="telefono" :value="__('Telefono')" />
                                <x-text-input id="telefono" name="telefono" type="text" class="mt-1 block w-full"/>
                            </div>
                        
                            <div>
                                <x-input-label for="correo" :value="__('Correo')" />
                                <x-text-input id="correo" name="correo" type="text" value="{{$usuario->email}}" class="mt-1 block w-full"/>
                            </div>
                        
                            <div>
                                <x-input-label for="web" :value="__('Web')" />
                                <x-text-input id="web" name="web" type="text" class="mt-1 block w-full"/>
                            </div>
                        
                            <div>
                                <x-input-label for="linkedin" :value="__('Linkedin')" />
                                <x-text-input id="linkedin" name="linkedin" type="text" class="mt-1 block w-full"/>
                            </div>
                        
                            <div>
                                <x-input-label for="github" :value="__('Github')" />
                                <x-text-input id="github" name="github" type="text" class="mt-1 block w-full"/>
                            </div>
                        </div>                                               

                        <div class="mt-3">
                            <x-primary-button>{{ __('Guardar') }}</x-primary-button>
                        </div>

                    </form>
                            
                </div>
            </div>

            {{-- EXPERIENCIA LABORAL --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
                <div class="p-6 text-gray-900">
                    
                    <h1>Experiencia Laboral</h1>
                    <form action="{{route('crear_experiencia')}}" method="POST" class="mt-6 space-y-6">
                        @csrf

                        <div class="grid gap-4" style="grid-template-columns: 1fr 1fr">
                            <div>
                                <x-input-label for="" :value="__('Empresa')" />
                                <x-text-input id="empresa" name="empresa" type="text" class="mt-1 block w-full" required/>
                            </div>
                        
                            <div>
                                <x-input-label for="" :value="__('Puesto')" />
                                <x-text-input id="puesto" name="puesto" type="text" class="mt-1 block w-full" required/>
                            </div>
                        
                            <div>
                                <x-input-label for="web" :value="__('Fecha de inicio')" />
                                <input type="date" id="fecha_inicio" name="fecha_inicio" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                {{-- <x-text-input id="web" name="web" type="text" class="mt-1 block w-full"/> --}}
                            </div>
                        
                            <div>
                                <x-input-label for="web" :value="__('Fecha de fin')" />
                                <input type="date" id="fecha_fin" name="fecha_fin" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            </div>
                        
                            <div>
                                <x-input-label for="github" :value="__('Descripcion')" />
                                <x-text-input id="descripcion_actividades" name="descripcion_actividades" type="text" class="mt-1 block w-full"/>
                            </div>
                        </div>                                               

                        <div class="mt-3">
                            <x-primary-button>{{ __('Guardar') }}</x-primary-button>
                        </div>

                    </form>
                            
                </div>
            </div>
            
            {{-- FORMACIÓN ACADÉMICA --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
                <div class="p-6 text-gray-900">
                    
                    <h1>Formación Académica</h1>
                    <form action="{{route('crear_formacion')}}" method="POST" class="mt-6 space-y-6">
                        @csrf

                        <div class="grid gap-4" style="grid-template-columns: 1fr 1fr">
                            <div>
                                <x-input-label for="" :value="__('Institución')" />
                                <x-text-input id="institucion" name="institucion" type="text" class="mt-1 block w-full" required/>
                            </div>
                        
                            <div>
                                <x-input-label for="" :value="__('Titulo')" />
                                <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" required/>
                            </div>
                        
                            <div>
                                <x-input-label for="web" :value="__('Fecha de inicio')" />
                                <input type="date" id="fecha_inicio" name="fecha_inicio" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                {{-- <x-text-input id="web" name="web" type="text" class="mt-1 block w-full"/> --}}
                            </div>
                        
                            <div>
                                <x-input-label for="web" :value="__('Fecha de fin')" />
                                <input type="date" id="fecha_fin" name="fecha_fin" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            </div>
                        
                        </div>                                               

                        <div class="mt-3">
                            <x-primary-button>{{ __('Guardar') }}</x-primary-button>
                        </div>

                    </form>
                            
                </div>
            </div>

            {{-- HABILIDADES --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
                <div class="p-6 text-gray-900">
                    
                    <h1>Habilidades</h1>
                    <form action="{{route('crear_habilidades')}}" method="POST" class="mt-6 space-y-6">
                        @csrf

                        <div class="grid gap-4" style="grid-template-columns: 1fr 1fr">
                            <div>
                                <x-input-label for="" :value="__('¿Cual es tu habilidad?')" />
                                <x-text-input id="habilidad" name="habilidad" type="text" class="mt-1 block w-full" required/>
                            </div>
                        
                            <div>
                                <x-input-label for="web" :value="__('Nivel')" />
                                <select name="nivel" id="nivel" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="Básico">Basico</option>
                                    <option value="Intermedio">Intermedio</option>
                                    <option value="Avanzado">Avanzado</option>
                                    <option value="Experto">Experto</option>
                                </select>
                            </div>
                        
                        </div>                                               

                        <div class="mt-3">
                            <x-primary-button>{{ __('Guardar') }}</x-primary-button>
                        </div>

                    </form>
                            
                </div>
            </div>

            <br>
            <a href="{{route('dashboard')}}">
                <x-primary-button>{{ __('Volver') }}</x-primary-button>
            </a>
        </div>
    </div>
</x-app-layout>
@endsection
