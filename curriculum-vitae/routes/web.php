<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [ProfileController::class, 'datosDashboard'])
     ->middleware(['auth', 'verified'])
     ->name('dashboard');

Route::middleware('auth')->group(function () {
    // Te lleva a la ventana de editar perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Te edita solo el perfil (nombre y correo)
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Logout
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Nos lleva al portafolio
    Route::get('/portafolio', [ProfileController::class, 'portafolio'])->name('mostrar_portafolio');
    // Nos lleva a la vista del formulario
    Route::get('/publicProfile', [ProfileController::class, 'vistaSocial'])->name('vista_publico');
    // Nos lleva a la vista de buscar
    Route::get('/encontrar', [ProfileController::class, 'ventanaAmigos'])->name('ventana_amigos');
    // Nos muestra los perfiles de los usuarios que buscamos
    Route::post('/encontrar', [ProfileController::class, 'buscarPerfil'])->name('buscar_perfil');
    // Nos lleva al controlador para recojer los datos del perfil
    Route::get('/perfil/{nombre}', [ProfileController::class, 'buscarCurriculum'])->name('buscar_curriculum');;

    // ------------------------------------------------------------------------------------------------------

    // Nos guarda los datos personales
    Route::post('/publicProfile', [ProfileController::class, 'crearPublico'])->name('crear_publico');
    // Nos guarda la experiencia laboral
    Route::post('/experiencia', [ProfileController::class, 'crearExperiencia'])->name('crear_experiencia');
    // Nos guarda la formacion academica
    Route::post('/formacion', [ProfileController::class, 'crearFormacion'])->name('crear_formacion');
    // Nos guarda las habilidades
    Route::post('/habilidades', [ProfileController::class, 'crearHabilidades'])->name('crear_habilidades');
    // Nos guarda el proyecto
    Route::post('/proyectos', [ProfileController::class, 'crearProyectos'])->name('crear_proyectos');

    // ------------------------------------------------------------------------------------------------------

    // Nos edita los datos personales
    Route::put('/publicProfile', [ProfileController::class, 'editarPublico'])->name('editar_publico');
    // Nos edita la experiencia laboral
    Route::put('/experiencia/{id}', [ProfileController::class, 'editarExperiencia'])->name('editar_experiencia');
    // Nos edita la formacion academica
    Route::put('/formacion/{id}', [ProfileController::class, 'editarFormacion'])->name('editar_formacion');
    // Nos edita las habilidades
    Route::put('habilidades/{id}', [ProfileController::class, 'editarHabilidades'])->name('editar_habilidades');
    // Nos edita los proyectos
    Route::put('/proyectos/{id}', [ProfileController::class, 'editarProyectos'])->name('editar_proyectos');

    // ------------------------------------------------------------------------------------------------------
    
    //Nos elimina una experiencia
    Route::delete('/deletex/{id}', [ProfileController::class, 'eliminarExperiencia'])->name('eliminar_experiencia'); 
    // Nos elimina una formacion
    Route::delete('/deletef/{id}', [ProfileController::class, 'eliminarFormacion'])->name('eliminar_formacion');
    // Nos elimina una habilidad
    Route::delete('/deleteh/{id}', [ProfileController::class, 'eliminarHabilidad'])->name('eliminar_habilidad');
    // Nos elimina un proyecto
    Route::delete('/deletep/{id}', [ProfileController::class, 'eliminarProyecto'])->name('eliminar_proyecto');

});

require __DIR__.'/auth.php';
