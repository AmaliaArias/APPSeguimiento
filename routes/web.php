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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. RUTA PÚBLICA: Pantalla de bienvenida original de Laravel
Route::get('/', function () {
    return view('welcome');
});

// 2. RUTAS PROTEGIDAS
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    // Módulos del Sistema - NORMALIZADOS
    Route::resource('Programasdeformacion', ProgramasdeformacionController::class)
        ->names('programasdeformacion')
        ->parameters(['Programasdeformacion' => 'nis']);

    Route::resource('Regionales', RegionalesController::class)
        ->names('Regionales')
        ->parameters(['Regionales' => 'nis']);

    Route::resource('Tiposdocumentos', TiposdocumentosController::class)
        ->names('Tiposdocumentos')
        ->parameters(['Tiposdocumentos' => 'nis']);

    Route::resource('Eps', EpsController::class)
        ->names('Eps')
        ->parameters(['Eps' => 'nis']);

    Route::get('/Rolesadministrativos/create', [\App\Http\Controllers\RolesadministrativosController::class, 'create'])
        ->name('Rolesadministrativos.create');

    Route::get('/Rolesadministrativos/index', [\App\Http\Controllers\RolesadministrativosController::class, 'index'])
        ->name('Rolesadministrativos.index');

    Route::post('/Rolesadministrativos/store', [\App\Http\Controllers\RolesadministrativosController::class, 'store'])
        ->name('Rolesadministrativos.store');

    Route::delete('/Rolesadministrativos/{nis}', [\App\Http\Controllers\RolesadministrativosController::class, 'destroy'])
        ->name('Rolesadministrativos.destroy');

    Route::put('/Rolesadministrativos/{nis}', [App\Http\Controllers\RolesadministrativosController::class, 'update'])
        ->name('Rolesadministrativos.update');

    Route::get('/Rolesadministrativos/{nis}', [App\Http\Controllers\RolesadministrativosController::class, 'show'])
        ->name('Rolesadministrativos.show');

    Route::get('/Rolesadministrativos/{nis}/edit', [App\Http\Controllers\RolesadministrativosController::class, 'edit'])
        ->name('Rolesadministrativos.edit');

    Route::resource('Aprendiz', AprendizController::class)
        ->names('Aprendiz')
        ->parameters(['Aprendiz' => 'nis']);

    Route::resource('Entecoformador', EntecoformadorController::class)
        ->names('Entecoformador')
        ->parameters(['Entecoformador' => 'nis']);

    Route::get('/Fichasdecaracterizacion/index', [\App\Http\Controllers\FichasdecaracterizacionController::class, 'index'])
        ->name('Fichasdecaracterizacion.index');

    Route::get('/Fichasdecaracterizacion/create', [\App\Http\Controllers\FichasdecaracterizacionController::class, 'create'])
        ->name('Fichasdecaracterizacion.create');

    Route::post('/Fichasdecaracterizacion/store', [\App\Http\Controllers\FichasdecaracterizacionController::class, 'store'])
        ->name('Fichasdecaracterizacion.store');

    Route::delete('/Fichasdecaracterizacion/{nis}', [\App\Http\Controllers\FichasdecaracterizacionController::class, 'destroy'])
        ->name('Fichasdecaracterizacion.destroy');

    Route::put('/Fichasdecaracterizacion/{nis}', [App\Http\Controllers\FichasdecaracterizacionController::class, 'update'])
        ->name('Fichasdecaracterizacion.update');

    Route::get('/Fichasdecaracterizacion/{nis}', [App\Http\Controllers\FichasdecaracterizacionController::class, 'show'])
        ->name('Fichasdecaracterizacion.show');

    Route::get('/Fichasdecaracterizacion/{nis}/edit', [App\Http\Controllers\FichasdecaracterizacionController::class, 'edit'])
        ->name('Fichasdecaracterizacion.edit');

    Route::resource('instructor', InstructorController::class)
        ->names('instructor')
        ->parameters(['instructor' => 'nis']);

    Route::resource('Centrosdeformacion', CentrosdeformacionController::class)
        ->names('Centrosdeformacion')
        ->parameters(['Centrosdeformacion' => 'nis']);

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 3. RUTAS DE AUTENTICACIÓN: Carga el login, registro y logout de Breeze
require __DIR__.'/auth.php';
