<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ProgramasdeformacionController;
use App\Http\Controllers\RegionalesController;
use App\Http\Controllers\TiposdocumentosController;
use App\Http\Controllers\EpsController;
use App\Http\Controllers\RolesadministrativosController;
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\EntecoformadorController;
use App\Http\Controllers\FichasdecaracterizacionController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CentrosdeformacionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BitacorasController;
use App\Http\Controllers\Aprendiz\DashboardController as AprendizDashboard;
use App\Http\Controllers\Aprendiz\PracticaController;


/* --- RUTA PÚBLICA --- */
Route::get('/', function () {
    return view('welcome');
});



/* --- RUTAS PROTEGIDAS (AUTH) --- */
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard General
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    /* --- GRUPO ÚNICO: INSTRUCTOR (Rol 2) --- */
    Route::middleware(['auth', 'role:2'])->prefix('instructor')->group(function () {

        // El Dashboard principal (Lista de aprendices)
        Route::get('/dashboard', [App\Http\Controllers\Instructor\InstructorController::class, 'index'])
            ->name('instructor.dashboard');

        // Ver las bitácoras de un aprendiz (Seguimiento)
        Route::get('/seguimiento/{nis}', [App\Http\Controllers\Instructor\InstructorController::class, 'verSeguimiento'])
            ->name('instructor.seguimiento');

        // Procesar la calificación
        Route::put('/calificar/{id}', [App\Http\Controllers\Instructor\InstructorController::class, 'calificar'])
            ->name('instructor.calificar');
    });

    /* --- GRUPO: APRENDIZ (Rol 3) --- */
    Route::prefix('aprendiz')->group(function () {
        Route::get('/practicas', [AprendizDashboard::class, 'index'])->name('aprendiz.dashboard');

        // Registro de etapa práctica
        Route::get('/registro-practica', [PracticaController::class, 'create'])->name('practica.create');
        Route::post('/registro-practica', [PracticaController::class, 'store'])->name('practica.store');

        // Consultar Instructor
        Route::get('/consultar-instructor', [AprendizDashboard::class, 'consultarInstructor'])->name('instructor.consulta');
        Route::post('/buscar-instructor', [AprendizDashboard::class, 'buscarInstructor'])->name('instructor.buscar');

        // Bitácoras del aprendiz
        Route::resource('mis-bitacoras', BitacorasController::class)->names('Bitacoras');
    });

    /* --- MÓDULOS ADMINISTRATIVOS (Rol 1) --- */
    // Estos recursos los mantengo como los tenías, pero sin duplicarlos
    Route::resource('Programasdeformacion', ProgramasdeformacionController::class)->names('programasdeformacion')->parameters(['Programasdeformacion' => 'nis']);
    Route::resource('Regionales', RegionalesController::class)->names('Regionales')->parameters(['Regionales' => 'nis']);
    Route::resource('Tiposdocumentos', TiposdocumentosController::class)->names('Tiposdocumentos')->parameters(['Tiposdocumentos' => 'nis']);
    Route::resource('Eps', EpsController::class)->names('Eps')->parameters(['Eps' => 'nis']);
    Route::resource('Entecoformador', EntecoformadorController::class)->names('Entecoformador')->parameters(['Entecoformador' => 'nis']);
    Route::resource('Centrosdeformacion', CentrosdeformacionController::class)->names('Centrosdeformacion')->parameters(['Centrosdeformacion' => 'nis']);
    Route::resource('Aprendiz', AprendizController::class)->names('Aprendiz')->parameters(['Aprendiz' => 'nis']);
    // Esto creará instructor.index, instructor.create, instructor.store, etc.
    Route::resource('instructor', App\Http\Controllers\InstructorController::class)
        ->names('instructor')
        ->parameters(['instructor' => 'nis']);

    // Módulos manuales (Fichas y Roles) para asegurar que funcionen tus rutas personalizadas
    Route::controller(FichasdecaracterizacionController::class)->group(function () {
        Route::get('/Fichasdecaracterizacion/index', 'index')->name('Fichasdecaracterizacion.index');
        Route::get('/Fichasdecaracterizacion/create', 'create')->name('Fichasdecaracterizacion.create');
        Route::post('/Fichasdecaracterizacion/store', 'store')->name('Fichasdecaracterizacion.store');
        Route::get('/Fichasdecaracterizacion/{nis}/edit', 'edit')->name('Fichasdecaracterizacion.edit');
        Route::put('/Fichasdecaracterizacion/{nis}', 'update')->name('Fichasdecaracterizacion.update');
        Route::delete('/Fichasdecaracterizacion/{nis}', 'destroy')->name('Fichasdecaracterizacion.destroy');
        Route::get('/Fichasdecaracterizacion/{nis}', 'show')->name('Fichasdecaracterizacion.show');
    });

    Route::controller(RolesadministrativosController::class)->group(function () {
        Route::get('/Rolesadministrativos/index', 'index')->name('Rolesadministrativos.index');
        Route::get('/Rolesadministrativos/create', 'create')->name('Rolesadministrativos.create');
        Route::post('/Rolesadministrativos/store', 'store')->name('Rolesadministrativos.store');
        Route::get('/Rolesadministrativos/{nis}/edit', 'edit')->name('Rolesadministrativos.edit');
        Route::put('/Rolesadministrativos/{nis}', 'update')->name('Rolesadministrativos.update');
        Route::delete('/Rolesadministrativos/{nis}', 'destroy')->name('Rolesadministrativos.destroy');
        Route::get('/Rolesadministrativos/{nis}', 'show')->name('Rolesadministrativos.show');
    });

    /* --- PERFIL --- */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
