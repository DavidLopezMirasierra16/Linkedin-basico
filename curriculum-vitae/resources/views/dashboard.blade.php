<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            <p>Panel de control</p>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="pb-1 p-6 text-gray-900">
                    <p>Bienvenido al panel de control, aquí podras consultar las diferentes funcionalidades de la aplicación.</p>
                </div>
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl">Curriculum Vitae</h1>

                    @if ($datos_perfil==null)
                        <p>Aqui se mostrará tu CV cuando rellenes los datos</p>
                    @else
                        <p>Estos son los datos que se mostraran al público.</p>
                        <hr class="mt-3" style="border: 1px solid #b0b0b0;">
                        
                        <div class="mt-6 p-3 mx-auto mt-2 sm:rounded-lg" style="background-color: #f3f4f6; width:70%">

                            <p class="text-xl mb-2">Informacion Personal</p>
                            {{-- DATOS PERFIL PUBLICO --}}
                            <div class="grid gap-2 mb-2" style="grid-template-columns: 1fr 1fr">
                                <div class="mt-2 flex flex-row">
                                    <p class="font-bold">Nombre: </p> 
                                    <p class="ml-1">{{$datos_perfil->nombre_completo}}</p>
                                </div>
                                <div class="mt-2 flex flex-row">
                                    <p class="font-bold">Profesion: </p> 
                                    <p class="ml-1">{{$datos_perfil->profesion}}</p>
                                </div>
                            </div>
                            <div class="mt-2 flex flex-row">
                                <p class="font-bold">Sobre mí: </p> 
                                <p class="ml-1">{{$datos_perfil->sobre_mi}}</p>
                            </div>

                            <p class="text-xl mt-5 mb-2">Contacto</p>
                            <div class="grid gap-2 mb-2" style="grid-template-columns: 1fr 1fr">
                                <div class="mt-2 flex flex-row">
                                    <p class="font-bold">Telefono: </p> 
                                    <p class="ml-1">{{$datos_perfil->telefono}}</p>
                                </div>
                                <div class="mt-2 flex flex-row">
                                    <p class="font-bold">Correo: </p> 
                                    <p class="ml-1">{{$datos_perfil->correo_electronico}}</p>
                                </div>
                            </div>

                            <p class="text-xl mt-5 mb-2">Conóceme</p>
                            <div class="grid gap-2 mb-2" style="grid-template-columns: 1fr 1fr 1fr">
                                <div class="mt-2 flex flex-row">
                                    <p class="font-bold">Web: </p> 

                                    @if ($datos_perfil->sitio_web != null)
                                        <a class="ml-1" href="{{$datos_perfil->sitio_web}}" target="_blank">{{$datos_perfil->sitio_web}}</a>
                                    @else
                                        <p class="ml-1">Vacio</p>
                                    @endif

                                </div>
                                <div class="mt-2 flex flex-row">
                                    <p class="font-bold">Linkedin: </p> 

                                    @if ($datos_perfil->linkedin != null)
                                        <a class="ml-1" href="{{$datos_perfil->linkedin}}" target="_blank">{{$datos_perfil->linkedin}}</a>
                                    @else
                                        <p class="ml-1">Vacio</p>
                                    @endif

                                </div>
                                <div class="mt-2 flex flex-row">
                                    <p class="font-bold">Github: </p> 

                                    @if ($datos_perfil->github != null)
                                        <a class="ml-1" href="{{$datos_perfil->github}}" target="_blank">{{$datos_perfil->github}}</a>
                                    @else
                                        <p class="ml-1">Vacio</p>
                                    @endif

                                </div>
                            </div>

                            <hr class="mt-8" style="border: 1px solid #b0b0b0;">

                            <p class="text-xl mt-5 mb-2">Educacion</p>
                            {{-- FORMACIÓN ACADÉMICA --}}
                            @for ($i = 0; $i < $educaciones_perfil->count(); $i++)
                                <div class="grid gap-2 mb-2" style="grid-template-columns: 1fr 1fr 1fr">
                                    <div class="mt-2 flex flex-row">
                                        <p class="font-bold">Institucion: </p> 
                                        <p class="ml-1">{{$educaciones_perfil[$i]->institucion}}</p>
                                    </div>
                                    <div class="mt-2 flex flex-row">
                                        <p class="font-bold">Titulación: </p> 
                                        <p class="ml-1">{{$educaciones_perfil[$i]->titulo_obtenido}}</p>
                                    </div>
                                    <div class="mt-2 flex flex-row">
                                        <p class="ml-1">{{$educaciones_perfil[$i]->fecha_inicio->format('Y-m-d')}} / {{$educaciones_perfil[$i]->fecha_fin!=null ? $educaciones_perfil[$i]->fecha_fin->format('Y-m-d') : 'Activo'}}</p>
                                    </div>
                                </div>
                            @endfor

                            <hr class="mt-8" style="border: 1px solid #b0b0b0;">
                            
                            <p class="text-xl mt-5 mb-2">Experiencia</p>
                            {{-- EXPERIENCIA --}}
                            @for ($i = 0; $i < $experiencia_perfil->count(); $i++)
                                <div class="grid gap-2 mb-2" style="grid-template-columns: 1fr 1fr 1fr">
                                    <div class="mt-2 flex flex-row">
                                        <p class="font-bold">Empresa: </p> 
                                        <p class="ml-1">{{$experiencia_perfil[$i]->empresa}}</p>
                                    </div>
                                    <div class="mt-2 flex flex-row">
                                        <p class="font-bold">Puesto: </p> 
                                        <p class="ml-1">{{$experiencia_perfil[$i]->puesto}}</p>
                                    </div>
                                    <div class="mt-2 flex flex-row">
                                        <p class="ml-1">{{$experiencia_perfil[$i]->fecha_inicio->format('Y-m-d')}} / {{$experiencia_perfil[$i]->fecha_fin!=null ? $experiencia_perfil[$i]->fecha_fin->format('Y-m-d') : 'Activo'}}</p>
                                    </div>
                                </div>
                                <div class="mt-2 flex flex-row">
                                    <p class="font-bold">Descripcion: </p> 
                                    <p class="ml-1">{{$experiencia_perfil[$i]->descripcion!=null ? $experiencia_perfil[$i]->descripcion : 'Vacio'}}</p>
                                </div>
                            @endfor

                            <hr class="mt-8" style="border: 1px solid #b0b0b0;">
                            
                            <p class="text-xl mt-5 mb-2">Habilidades</p>
                            {{-- HABILIDADES --}}
                            @for ($i = 0; $i < $habilidades_perfil->count(); $i++)
                                <div class="grid gap-2 mb-2" style="grid-template-columns: 1fr 1fr">
                                    <div class="mt-2 flex flex-row">
                                        <p class="font-bold">Habilidad: </p> 
                                        <p class="ml-1">{{$habilidades_perfil[$i]->nombre_habilidad}}</p>
                                    </div>
                                    <div class="mt-2 flex flex-row">
                                        <p class="font-bold">Nivel: </p> 
                                        <p class="ml-1">{{$habilidades_perfil[$i]->nivel}}</p>
                                    </div>
                                </div>
                            @endfor

                            <hr class="mt-8" style="border: 1px solid #b0b0b0;">
                            
                            <p class="text-xl mt-5 mb-2">Proyectos</p>
                            {{-- PROYECTOS --}}
                            @for ($i = 0; $i < $proyectos_perfil->count(); $i++)
                                <div class="grid gap-2 mb-2" style="grid-template-columns: 1fr 1fr">
                                    <div class="mt-2 flex flex-row">
                                        <p class="font-bold">Proyecto: </p> 
                                        <p class="ml-1">{{$proyectos_perfil[$i]->titulo}}</p>
                                    </div>
                                    <div class="mt-2 flex flex-row">
                                        <p class="font-bold">Descripcion: </p> 
                                        <p class="ml-1">{{$proyectos_perfil[$i]->descripcion}}</p>
                                    </div>
                                </div>
                                <div class="mt-2 flex flex-row">
                                    <p class="font-bold">Enlace: </p> 

                                    @if ($proyectos_perfil[$i]->enlace_proyecto != null)
                                        <a class="ml-1" href="{{$proyectos_perfil[$i]->enlace_proyecto}}" target="_blank">{{$proyectos_perfil[$i]->enlace_proyecto}}</a>
                                    @else
                                        <p class="ml-1">Vacio</p>
                                    @endif

                                </div>
                            @endfor

                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
