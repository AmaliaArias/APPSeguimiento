<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Welcome');
});


// Usa esta única ruta para el dashboard
use App\Http\Controllers\Dashboard;

Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

// Si quieres que al entrar a la raíz (/) también vaya al dashboard:
Route::get('/', [Dashboard::class, 'index']);


Route::get('/Programasdeformacion/index', [\App\Http\Controllers\ProgramasdeformacionController::class, 'index'])
    ->name('programasdeformacion.index');

Route::get('/Programasdeformacion/create', [\App\Http\Controllers\ProgramasdeformacionController::class, 'create'])
    ->name('programasdeformacion.create');

Route::post('/Programasdeformacion/store', [\App\Http\Controllers\ProgramasdeformacionController::class, 'store'])
    ->name('programasdeformacion.store');

Route::delete('/Programasdeformacion/{nis}', [App\Http\Controllers\ProgramasdeformacionController::class, 'destroy'])
    ->name('programasdeformacion.destroy');

Route::get('/Programasdeformacion/{nis}/edit', [App\Http\Controllers\ProgramasdeformacionController::class, 'edit'])
    ->name('programasdeformacion.edit');

Route::put('/Programasdeformacion/{nis}', [App\Http\Controllers\ProgramasdeformacionController::class, 'update'])
    ->name('programasdeformacion.update');

Route::get('/Programasdeformacion/{nis}', [App\Http\Controllers\ProgramasdeformacionController::class, 'show'])
    ->name('programasdeformacion.show');



Route::get('/Regionales/index', [\App\Http\Controllers\RegionalesController::class, 'index'])
    ->name('Regionales.index');

Route::get('/Regionales/create', [\App\Http\Controllers\RegionalesController::class, 'create'])
    ->name('regionales.create');

Route::post('/Regionales/store', [\App\Http\Controllers\RegionalesController::class, 'store'])
    ->name('regionales.store');

Route::delete('/Regionales/{nis}', [\App\Http\Controllers\RegionalesController::class, 'destroy'])
    ->name('Regionales.destroy');

Route::get('/Regionales/{nis}/edit', [App\Http\Controllers\RegionalesController::class, 'edit'])
    ->name('Regionales.edit');

Route::put('/Regionales/{nis}', [App\Http\Controllers\RegionalesController::class, 'update'])
    ->name('Regionales.update');

Route::get('/Regionales/{nis}', [App\Http\Controllers\RegionalesController::class, 'show'])
    ->name('Regionales.show');



Route::get('/Tiposdocumentos/index', [\App\Http\Controllers\TiposdocumentosController::class, 'index'])
    ->name('Tiposdocumentos.index');

Route::get('/Tiposdocumentos/create', [\App\Http\Controllers\TiposdocumentosController::class, 'create'])
    ->name('Tiposdocumentos.create');

Route::post('/Tiposdocumentos/store', [\App\Http\Controllers\TiposdocumentosController::class, 'store'])
    ->name('Tiposdocumentos.store');

Route::delete('/Tiposdocumentos/{nis}', [App\Http\Controllers\TiposdocumentosController::class, 'destroy'])
    ->name('Tiposdocumentos.destroy');

Route::get('/Tiposdocumentos/{nis}/edit', [App\Http\Controllers\TiposdocumentosController::class, 'edit'])
    ->name('Tiposdocumentos.edit');

Route::put('/Tiposdocumentos/{nis}', [App\Http\Controllers\TiposdocumentosController::class, 'update'])
    ->name('Tiposdocumentos.update');

Route::get('/Tiposdocumentos/{nis}', [App\Http\Controllers\TiposdocumentosController::class, 'show'])
    ->name('Tiposdocumentos.show');



Route::get('/Eps/index', [\App\Http\Controllers\EpsController::class, 'index'])
    ->name('Eps.index');

Route::get('/Eps/create', [\App\Http\Controllers\EpsController::class, 'create'])
    ->name('Eps.create');

Route::post('/Eps/store', [\App\Http\Controllers\EpsController::class, 'store'])
    ->name('Eps.store');

Route::get('/Eps/{nis}/edit', [App\Http\Controllers\EpsController::class, 'edit'])
    ->name('Eps.edit');

Route::put('/Eps/{nis}', [App\Http\Controllers\EpsController::class, 'update'])
    ->name('Eps.update');

Route::delete('/Eps/{nis}', [App\Http\Controllers\EpsController::class, 'destroy'])
    ->name('Eps.destroy');

Route::get('/Eps/{nis}', [App\Http\Controllers\EpsController::class, 'show'])
    ->name('Eps.show');



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



Route::get('/Aprendiz/index', [\App\Http\Controllers\AprendizController::class, 'index'])
    ->name('Aprendiz.index');

Route::get('/Aprendiz/create', [App\Http\Controllers\AprendizController::class, 'create'])
    ->name('Aprendiz.create');

Route::post('/Aprendiz/store', [App\Http\Controllers\AprendizController::class, 'store'])
    ->name('Aprendiz.store');

Route::delete('/Aprendiz/{nis}', [\App\Http\Controllers\AprendizController::class, 'destroy'])
    ->name('Aprendiz.destroy');

Route::put('/Aprendiz/{nis}', [App\Http\Controllers\AprendizController::class, 'update'])
    ->name('Aprendiz.update');

Route::get('/Aprendiz/{nis}', [App\Http\Controllers\AprendizController::class, 'show'])
    ->name('Aprendiz.show');

Route::get('/Aprendiz/{nis}/edit', [App\Http\Controllers\AprendizController::class, 'edit'])
    ->name('Aprendiz.edit');



Route::get('/Entecoformador/index', [\App\Http\Controllers\EntecoformadorController::class, 'index'])
    ->name('Entecoformador.index');

Route::get('/Entecoformador/create', [App\Http\Controllers\EntecoformadorController::class, 'create'])
    ->name('Entecoformador.create');

Route::post('/Entecoformador/store', [App\Http\Controllers\EntecoformadorController::class, 'store'])
    ->name('Entecoformador.store');

Route::delete('/Entecoformador/{nis}', [\App\Http\Controllers\EntecoformadorController::class, 'destroy'])
    ->name('Entecoformador.destroy');

Route::put('/Entecoformador/{nis}', [App\Http\Controllers\EntecoformadorController::class, 'update'])
    ->name('Entecoformador.update');

Route::get('/Entecoformador/{nis}', [App\Http\Controllers\EntecoformadorController::class, 'show'])
    ->name('Entecoformador.show');

Route::get('/Entecoformador/{nis}/edit', [App\Http\Controllers\EntecoformadorController::class, 'edit'])
    ->name('Entecoformador.edit');



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



Route::get('/Instructor/index', [\App\Http\Controllers\InstructorController::class, 'index'])
    ->name('Instructor.index');

Route::get('/Instructor/create', [App\Http\Controllers\InstructorController::class, 'create'])
    ->name('Instructor.create');

Route::post('/Instructor/store', [App\Http\Controllers\InstructorController::class, 'store'])
    ->name('Instructor.store');

Route::delete('/Instructor/{nis}', [\App\Http\Controllers\InstructorController::class, 'destroy'])
    ->name('Instructor.destroy');

Route::put('/Instructor/{nis}', [App\Http\Controllers\InstructorController::class, 'update'])
    ->name('Instructor.update');

Route::get('/Instructor/{nis}', [App\Http\Controllers\InstructorController::class, 'show'])
    ->name('Instructor.show');

Route::get('/Instructor/{nis}/edit', [App\Http\Controllers\InstructorController::class, 'edit'])
    ->name('Instructor.edit');



Route::get('/Centrosdeformacion/create', [App\Http\Controllers\CentrosdeformacionController::class, 'create'])
    ->name('Centrosdeformacion.create');

Route::post('/Centrosdeformacion/store', [App\Http\Controllers\CentrosdeformacionController::class, 'store'])
    ->name('Centrosdeformacion.store');

Route::get('/Centrosdeformacion/index', [\App\Http\Controllers\CentrosdeformacionController::class, 'index'])
    ->name('Centrosdeformacion.index');

Route::delete('/Centrosdeformacion/{nis}', [\App\Http\Controllers\CentrosdeformacionController::class, 'destroy'])
    ->name('Centrosdeformacion.destroy');

Route::put('/Centrosdeformacion/{nis}', [App\Http\Controllers\CentrosdeformacionController::class, 'update'])
    ->name('Centrosdeformacion.update');

Route::get('/Centrosdeformacion/{nis}', [App\Http\Controllers\CentrosdeformacionController::class, 'show'])
    ->name('Centrosdeformacion.show');

Route::get('/Centrosdeformacion/{nis}/edit', [App\Http\Controllers\CentrosdeformacionController::class, 'edit'])
    ->name('Centrosdeformacion.edit');
