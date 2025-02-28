<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Educacione;
use App\Models\Experiencia;
use App\Models\Habilidade;
use App\Models\Perfile;
use App\Models\Proyecto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    // ----------------------------------------------------------------------------------------------------------
    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ----------------------------------------------------------------------------------------------------------

    public function datosDashboard(Request $request)
    {
        $usuario = $request->user();

        $datos_perfil = Perfile::where('usuario_id', $usuario->id)->first();
        $experiencia_perfil = $usuario->experiencias;
        $educaciones_perfil = $usuario->educaciones;
        $habilidades_perfil = $usuario->habilidades;
        $proyectos_perfil = $usuario->proyectos;

        return view('dashboard', compact('usuario', 'datos_perfil', 'experiencia_perfil', 'educaciones_perfil', 'habilidades_perfil', 'proyectos_perfil'));
    }

    public function ventanaAmigos()
    {
        $user = Auth::user();
        return view('Encontrar-amigos', compact('user'));
    }

    public function buscarPerfil(Request $datos_buscar)
    {
        $nombre = $datos_buscar->nombre;
        $usuario_buscar = Perfile::where('nombre_completo', 'like', '%' . $nombre . '%')->with('user')->get();

        return view('Encontrar-amigos', compact('usuario_buscar', 'nombre'));
    }

    public function buscarCurriculum($nombre)
    {
        $no_guion = str_replace('-', ' ', $nombre);

        $datos_perfil = Perfile::where('nombre_completo', $no_guion)->first();
        $usuario = $datos_perfil->user;
        $experiencia_perfil = $usuario->experiencias;
        $educaciones_perfil = $usuario->educaciones;
        $habilidades_perfil = $usuario->habilidades;
        $proyectos_perfil = $usuario->proyectos;

        // return view('vista donde mandamos los datos del perfil', compact('datos del usuario'));
        return view('Curriculum', compact('datos_perfil', 'usuario', 'experiencia_perfil', 'educaciones_perfil', 'habilidades_perfil', 'proyectos_perfil'));
    }

    // ----------------------------------------------------------------------------------------------------------

    public function vistaSocial(Request $request)
    {
        $usuario = $request->user();

        $datos_perfil = Perfile::where('usuario_id', $usuario->id)->first();
        $experiencia_perfil = $usuario->experiencias;
        $educaciones_perfil = $usuario->educaciones;
        $habilidades_perfil = $usuario->habilidades;
        $proyectos_perfil = $usuario->proyectos;

        if ($usuario->perfiles()->count() == 0) {
            return view('FomularioCrearPerfilPublico', compact('usuario'));
        } else {
            return view('FormlarioEditarPerfilPublico', compact('usuario', 'datos_perfil', 'experiencia_perfil', 'educaciones_perfil', 'habilidades_perfil', 'proyectos_perfil'));
        }
    }

    public function crearPublico(Request $datos_crear)
    {

        $usuario = $datos_crear->user();
        $newPerfil = new Perfile();

        $newPerfil->usuario_id = $usuario->id;
        $newPerfil->nombre_completo = $datos_crear->nombre;
        $newPerfil->profesion = $datos_crear->profesion;
        $newPerfil->sobre_mi = $datos_crear->descripcion;
        $newPerfil->telefono = $datos_crear->telefono;
        $newPerfil->correo_electronico = $datos_crear->correo;
        $newPerfil->sitio_web = $datos_crear->web;
        $newPerfil->linkedin = $datos_crear->linkedin;
        $newPerfil->github = $datos_crear->github;
        $newPerfil->save();

        return redirect('/publicProfile')->with('status', 'profile-updated');
    }

    public function editarPublico(Request $datos_editar)
    {
        $usuario = Auth::user(); //Otra forma de pillar el usuario

        $publico_editar = Perfile::where('usuario_id', $usuario->id)->first();

        $publico_editar->nombre_completo = $datos_editar->nombre;
        $publico_editar->profesion = $datos_editar->profesion;
        $publico_editar->sobre_mi = $datos_editar->descripcion;
        $publico_editar->telefono = $datos_editar->telefono;
        $publico_editar->correo_electronico = $datos_editar->correo;
        $publico_editar->sitio_web = $datos_editar->web;
        $publico_editar->linkedin = $datos_editar->linkedin;
        $publico_editar->github = $datos_editar->github;
        $publico_editar->save();

        return redirect('/publicProfile')->with('status', 'profile-updated');
    }

    // ----------------------------------------------------------------------------------------------------------

    public function crearExperiencia(Request $datos_experiencia)
    {

        $usuario = $datos_experiencia->user();
        $newExperiencia = new Experiencia();

        $newExperiencia->usuario_id = $usuario->id;
        $newExperiencia->empresa = $datos_experiencia->empresa;
        $newExperiencia->puesto = $datos_experiencia->puesto;
        $newExperiencia->fecha_inicio = $datos_experiencia->fecha_inicio;
        $newExperiencia->fecha_fin = $datos_experiencia->fecha_fin;
        $newExperiencia->descripcion = $datos_experiencia->descripcion_actividades;
        $newExperiencia->save();

        return redirect('/publicProfile')->with('status', 'profile-updated');
    }

    public function editarExperiencia($id, Request $datos_eDexperiencia)
    {
        $usuario = Auth::user();
        $experencia_editar = Experiencia::where('id', $id)->first();

        $experencia_editar->usuario_id = $usuario->id;
        $experencia_editar->empresa = $datos_eDexperiencia->empresa;
        $experencia_editar->puesto = $datos_eDexperiencia->puesto;
        $experencia_editar->fecha_inicio = $datos_eDexperiencia->fecha_inicio;
        $experencia_editar->fecha_fin = $datos_eDexperiencia->fecha_fin;
        $experencia_editar->descripcion = $datos_eDexperiencia->descripcion_actividades;
        $experencia_editar->save();

        return redirect('/publicProfile')->with('status', 'profile-updated');
    }

    public function eliminarExperiencia($id)
    {
        $exp_delete = Experiencia::find($id);

        $exp_delete->delete();
        return redirect('/publicProfile')->with('status', 'profile-updated');
    }

    // ----------------------------------------------------------------------------------------------------------

    public function crearFormacion(Request $datos_formacion)
    {
        $usuario = $datos_formacion->user();
        $newFormacion = new Educacione();

        $newFormacion->usuario_id = $usuario->id;
        $newFormacion->institucion = $datos_formacion->institucion;
        $newFormacion->titulo_obtenido = $datos_formacion->titulo;
        $newFormacion->fecha_inicio = $datos_formacion->fecha_inicio;
        $newFormacion->fecha_fin = $datos_formacion->fecha_fin;
        $newFormacion->save();

        return redirect('publicProfile')->with('status', 'profile-updated');
    }

    public function editarFormacion($id, Request $datos_eDformacion)
    {
        $usuario = Auth::user();
        $formacion_editar = Educacione::find($id);

        $formacion_editar->usuario_id = $usuario->id;
        $formacion_editar->institucion = $datos_eDformacion->institucion;
        $formacion_editar->titulo_obtenido = $datos_eDformacion->titulo;
        $formacion_editar->fecha_inicio = $datos_eDformacion->fecha_inicio;
        $formacion_editar->fecha_fin = $datos_eDformacion->fecha_fin;
        $formacion_editar->save();

        return redirect('publicProfile')->with('status', 'profile-updated');
    }

    public function eliminarFormacion($id)
    {
        $eliminar_formacion = Educacione::find($id);

        $eliminar_formacion->delete();
        return redirect('publicProfile')->with('status', 'profile-updated');
    }

    // ----------------------------------------------------------------------------------------------------------

    public function crearHabilidades(Request $datos_habilidades)
    {
        $usuario = $datos_habilidades->user();
        $newHabilidades = new Habilidade();

        $newHabilidades->usuario_id = $usuario->id;
        $newHabilidades->nombre_habilidad = $datos_habilidades->habilidad;
        $newHabilidades->nivel = $datos_habilidades->nivel;
        $newHabilidades->save();

        return redirect('publicProfile')->with('status', 'profile-updated');
    }

    public function editarHabilidades($id, Request $datos_eDhabilidades)
    {
        $usuario = Auth::user();
        $habilidad_editar = Habilidade::find($id);

        $habilidad_editar->usuario_id = $usuario->id;
        $habilidad_editar->nombre_habilidad = $datos_eDhabilidades->habilidad;
        $habilidad_editar->nivel = $datos_eDhabilidades->nivel;
        $habilidad_editar->save();

        return redirect('publicProfile')->with('status', 'profile-updated');
    }

    public function eliminarHabilidad($id)
    {
        $habilidad_eliminar = Habilidade::find($id);

        $habilidad_eliminar->delete();
        return redirect('publicProfile')->with('status', 'profile-updated');
    }

    // ----------------------------------------------------------------------------------------------------------

    public function crearProyectos(Request $datos_proyecto)
    {
        $usuario = Auth::user();
        $newProyecto = new Proyecto();

        $newProyecto->usuario_id = $usuario->id;
        $newProyecto->titulo = $datos_proyecto->titulo;
        $newProyecto->descripcion = $datos_proyecto->descripcion;
        $newProyecto->enlace_proyecto = $datos_proyecto->proyecto;
        $newProyecto->save();

        return redirect('publicProfile')->with('status', 'profile-updated');
    }

    public function editarProyectos($id, Request $datos_eDproyecto)
    {
        $usuario = Auth::user();
        $proyecto_editar = Proyecto::find($id);

        $proyecto_editar->usuario_id = $usuario->id;
        $proyecto_editar->titulo = $datos_eDproyecto->titulo;
        $proyecto_editar->descripcion = $datos_eDproyecto->descripcion;
        $proyecto_editar->enlace_proyecto = $datos_eDproyecto->proyecto;
        $proyecto_editar->save();

        return redirect('publicProfile')->with('status', 'profile-updated');
    }

    public function eliminarProyecto($id)
    {
        $proyecto_eliminar = Proyecto::find($id);

        $proyecto_eliminar->delete();
        return redirect('publicProfile')->with('status', 'profile-updated');
    }

    // ----------------------------------------------------------------------------------------------------------

    public function portafolio() {}

    // ----------------------------------------------------------------------------------------------------------
    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ----------------------------------------------------------------------------------------------------------

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
