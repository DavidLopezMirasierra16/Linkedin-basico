@extends('layouts.principal')

@section('title', 'Editar perfil publico')

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
                    
                    <h1><b>Datos Personales</b></h1>
                    <form action="{{route('editar_publico')}}" method="POST" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid gap-4" style="grid-template-columns: 1fr 1fr">
                            <div class="mb-3">
                                <x-input-label for="" :value="__('Nombre completo')" />
                                <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" value="{{$datos_perfil->nombre_completo}}" required/>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="" :value="__('Profesion')" />
                                <x-text-input id="profesion" name="profesion" type="text" class="mt-1 block w-full" value="{{$datos_perfil->profesion}}" required/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-input-label for="" :value="__('Descripcion breve')" />
                            <x-text-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full" value="{{$datos_perfil->sobre_mi}}"/>
                        </div>
                        <div class="grid gap-4" style="grid-template-columns: 1fr 1fr">
                            <div>
                                <x-input-label for="telefono" :value="__('Telefono')" />
                                <x-text-input id="telefono" name="telefono" type="text" class="mt-1 block w-full" value="{{$datos_perfil->telefono}}"/>
                            </div>
                        
                            <div>
                                <x-input-label for="correo" :value="__('Correo')" />
                                <x-text-input id="correo" name="correo" type="text" class="mt-1 block w-full" value="{{$datos_perfil->correo_electronico}}"/>
                            </div>
                        
                            <div>
                                <x-input-label for="web" :value="__('Web')" />
                                <x-text-input id="web" name="web" type="text" class="mt-1 block w-full" value="{{$datos_perfil->sitio_web}}"/>
                            </div>
                        
                            <div>
                                <x-input-label for="linkedin" :value="__('Linkedin')" />
                                <x-text-input id="linkedin" name="linkedin" type="text" class="mt-1 block w-full" value="{{$datos_perfil->linkedin}}"/>
                            </div>
                        
                            <div>
                                <x-input-label for="github" :value="__('Github')" />
                                <x-text-input id="github" name="github" type="text" class="mt-1 block w-full" value="{{$datos_perfil->github}}"/>
                            </div>
                        </div>                                               

                        <div class="mt-3">
                            <x-primary-button>{{ __('Editar') }}</x-primary-button>
                        </div>

                    </form>
                            
                </div>
            </div>

            {{-- EXPERIENCIA LABORAL --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
                <div class="p-6 text-gray-900">
                    
                    <h1><b>Experiencia Laboral</b></h1>
                    @for ($i = 0; $i < $experiencia_perfil->count(); $i++)
                        
                        <form action="{{route('editar_experiencia', $experiencia_perfil[$i]->id)}}" method="POST" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')

                            <div class="grid gap-4" style="grid-template-columns: 1fr 1fr">
                                <div>
                                    <x-input-label for="" :value="__('Empresa')" />
                                    <x-text-input id="empresa" name="empresa" type="text" class="mt-1 block w-full"  value="{{$experiencia_perfil[$i]->empresa}}" required/>
                                </div>
                            
                                <div>
                                    <x-input-label for="" :value="__('Puesto')" />
                                    <x-text-input id="puesto" name="puesto" type="text" class="mt-1 block w-full" value="{{$experiencia_perfil[$i]->puesto}}" required/>
                                </div>
                                
                                <div>
                                    <x-input-label for="web" :value="__('Fecha de inicio')" />
                                    <input type="date" id="fecha_inicio" name="fecha_inicio" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" value="{{$experiencia_perfil[$i]->fecha_inicio->format('Y-m-d')}}" required>
                                </div>
                                
                                <div>
                                    <x-input-label for="web" :value="__('Fecha de finalizacion')" />
                                    <input type="date" id="fecha_fin" name="fecha_fin" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" value="{{$experiencia_perfil[$i]->fecha_fin!=null ? $experiencia_perfil[$i]->fecha_fin->format('Y-m-d') : ""}}">
                                </div>
                                
                                <div>
                                    <x-input-label for="github" :value="__('Descripcion')" />
                                    <x-text-input id="descripcion_actividades" name="descripcion_actividades" type="text" class="mt-1 block w-full" value="{{$experiencia_perfil[$i]->descripcion}}"/>
                                </div>
                            </div>                                               
                                
                            <div class="mt-3">
                                <x-primary-button>{{ __('Editar') }}</x-primary-button> 
                            </div>
                            
                        </form>
                        <form action="{{route('eliminar_experiencia', $experiencia_perfil[$i]->id)}}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            
                            <x-danger-button>
                                {{ __('Eliminar') }}
                            </x-danger-button>
                        </form>

                    @endfor

                    {{-- ---------------------------------------------------------------------------------------------------------------- --}}
                    
                    @if (!$experiencia_perfil->count()==0)
                        <hr class="mt-8" style="border: 1px solid #b0b0b0;">
                    @endif

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
                            </div>
                            
                            <div>
                                <x-input-label for="web" :value="__('Fecha de finalizacion')" />
                                
                                <input type="date" id="fecha_fin" name="fecha_fin" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                            </div>
                            
                            <div>
                                <x-input-label for="github" :value="__('Descripcion')" />
                                <x-text-input id="descripcion_actividades" name="descripcion_actividades" type="text" class="mt-1 block w-full" />
                            </div>
                        </div>                                               
                            
                        <div class="mt-3">
                            <x-primary-button>{{ __('Añadir') }}</x-primary-button>
                        </div>

                    </form>
                            
                </div>
            </div>
            
            {{-- FORMACIÓN ACADÉMICA --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
                <div class="p-6 text-gray-900">
                    
                    <h1><b>Formación Académica</b></h1>
                    @for ($i = 0; $i < $educaciones_perfil->count(); $i++)

                        <form action="{{route('editar_formacion', $educaciones_perfil[$i]->id)}}" method="POST" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')

                            <div class="grid gap-4" style="grid-template-columns: 1fr 1fr">
                                <div>
                                    <x-input-label for="" :value="__('Institución')" />
                                    <x-text-input id="institucion" name="institucion" type="text" class="mt-1 block w-full" value="{{$educaciones_perfil[$i]->institucion}}" required/>
                                </div>
                            
                                <div>
                                    <x-input-label for="" :value="__('Titulo')" />
                                    <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" value="{{$educaciones_perfil[$i]->titulo_obtenido}}" required/>
                                </div>
                            
                                <div>
                                    <x-input-label for="web" :value="__('Fecha de inicio')" />
                                    <input type="date" id="fecha_inicio" name="fecha_inicio" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" value="{{$educaciones_perfil[$i]->fecha_inicio->format('Y-m-d')}}" required>
                                </div>
                            
                                <div>
                                    <x-input-label for="web" :value="__('Fecha de finalizacion')" />
                                    <input type="date" id="fecha_fin" name="fecha_fin" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" value="{{$educaciones_perfil[$i]->fecha_fin!=null ? $educaciones_perfil[$i]->fecha_fin->format('Y-m-d') : ""}}">
                                </div>
                            
                            </div>                                               

                            <div class="mt-3">
                                <x-primary-button>{{ __('Editar') }}</x-primary-button>
                            </div>
                        </form>
                        <form action="{{route('eliminar_formacion', $educaciones_perfil[$i]->id)}}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            
                            <x-danger-button>
                                {{ __('Eliminar') }}
                            </x-danger-button>
                        </form>
                    @endfor
                    
                    {{-- ---------------------------------------------------------------------------------------------------------------- --}}
                    
                    @if (!$educaciones_perfil->count()==0)
                        <hr class="mt-8" style="border: 1px solid #b0b0b0;">
                    @endif
                    
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
                            </div>
                        
                            <div>
                                <x-input-label for="web" :value="__('Fecha de finalizacion')" />
                                <input type="date" id="fecha_fin" name="fecha_fin" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            </div>
                        
                        </div>                                               

                        <div class="mt-3">
                            <x-primary-button>{{ __('Añadir') }}</x-primary-button>
                        </div>
                    </form>

                </div>
            </div>

            {{-- HABILIDADES --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
                <div class="p-6 text-gray-900">
                    
                    <h1><b>Habilidades</b></h1>
                    @for ($i = 0; $i < $habilidades_perfil->count(); $i++)
                    
                        <form action="{{route('editar_habilidades', $habilidades_perfil[$i]->id)}}" method="POST" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')
                    
                            <div class="grid gap-4" style="grid-template-columns: 1fr 1fr">
                                <div>
                                    <x-input-label for="" :value="__('¿Cual es tu habilidad?')" />
                                    <x-text-input id="habilidad" name="habilidad" type="text" class="mt-1 block w-full" value="{{$habilidades_perfil[$i]->nombre_habilidad}}" required/>
                                </div>
                            
                                <div>
                                    <x-input-label for="web" :value="__('Nivel')" />
                                    <select name="nivel" id="nivel" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        <option value="Básico" {{$habilidades_perfil[$i]->nivel==='Básico' ? 'selected' : ''}}>Basico</option>
                                        <option value="intermedio" {{$habilidades_perfil[$i]->nivel==='Intermedio' ? 'selected' : ''}}>Intermedio</option>
                                        <option value="Avanzado" {{$habilidades_perfil[$i]->nivel==='Avanzado' ? 'selected' : ''}}>Avanzado</option>
                                        <option value="Experto" {{$habilidades_perfil[$i]->nivel==='Experto' ? 'selected' : ''}}>Experto</option>
                                    </select>
                                </div>
                            </div>                                               
                            
                            <div class="mt-3">
                                <x-primary-button>{{ __('Editar') }}</x-primary-button>
                            </div>
                            
                        </form>
                        <form action="{{route('eliminar_habilidad', $habilidades_perfil[$i]->id)}}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            
                            <x-danger-button>
                                {{ __('Eliminar') }}
                            </x-danger-button>
                        </form>
                    @endfor
                           
                    {{-- ---------------------------------------------------------------------------------------------------------------- --}}
                    
                    @if (!$habilidades_perfil->count()==0)
                        <hr class="mt-8" style="border: 1px solid #b0b0b0;">
                    @endif

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
                                    <option value="intermedio">Intermedio</option>
                                    <option value="Avanzado">Avanzado</option>
                                    <option value="Experto">Experto</option>
                                </select>
                            </div>
                        </div>                                               
                        
                        <div class="mt-3">
                            <x-primary-button>{{ __('Añadir') }}</x-primary-button>
                        </div>
                        
                    </form>

                </div>
            </div>

            {{-- PROYECTOS --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
                <div class="p-6 text-gray-900">
                    
                    <h1><b>Proyectos</b></h1>
                    @for ($i = 0; $i < $proyectos_perfil->count(); $i++)
                    
                        <form action="{{route('editar_proyectos', $proyectos_perfil[$i]->id)}}" method="POST" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')
                    
                            <div class="grid gap-4" style="grid-template-columns: 1fr 1fr">
                                <div>
                                    <x-input-label for="" :value="__('Titulo')" />
                                    <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" value="{{$proyectos_perfil[$i]->titulo}}" required/>
                                </div>
                            
                                <div>
                                    <x-input-label for="" :value="__('Descripcion')" />
                                    <x-text-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full" value="{{$proyectos_perfil[$i]->descripcion}}" required/>
                                </div>

                                <div>
                                    <x-input-label for="" :value="__('Enlace del proyecto')" />
                                    <x-text-input id="proyecto" name="proyecto" type="text" class="mt-1 block w-full" value="{{$proyectos_perfil[$i]->enlace_proyecto}}"/>
                                </div>
                            </div>                                               
                            
                            <div class="mt-3">
                                <x-primary-button>{{ __('Editar') }}</x-primary-button>
                            </div>
                            
                        </form>
                        <form action="{{route('eliminar_proyecto', $proyectos_perfil[$i]->id)}}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            
                            <x-danger-button>
                                {{ __('Eliminar') }}
                            </x-danger-button>
                        </form>
                    @endfor
                           
                    {{-- ---------------------------------------------------------------------------------------------------------------- --}}
                    
                    @if (!$proyectos_perfil->count()==0)
                        <hr class="mt-8" style="border: 1px solid #b0b0b0;">
                    @endif

                    <form action="{{route('crear_proyectos')}}" method="POST" class="mt-6 space-y-6">
                        @csrf
                
                        <div class="grid gap-4" style="grid-template-columns: 1fr 1fr">
                            <div>
                                <x-input-label for="" :value="__('Titulo')" />
                                <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" required/>
                            </div>
                        
                            <div>
                                <x-input-label for="" :value="__('Descripcion')" />
                                <x-text-input id="descripcion" name="descripcion" type="text" class="mt-1 block w-full" required/>
                            </div>

                            <div>
                                <x-input-label for="" :value="__('Enlace del proyecto')" />
                                <x-text-input id="proyecto" name="proyecto" type="text" class="mt-1 block w-full" />
                            </div>
                        </div>                                               
                        
                        <div class="mt-3">
                            <x-primary-button>{{ __('Añadir') }}</x-primary-button>
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
