<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\TipoPropiedadController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\DetalleAlquilerController;

Route::resource('roles', RolController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('ubicaciones', UbicacionController::class);
Route::resource('tipos-propiedad', TipoPropiedadController::class);
Route::resource('propiedades', PropiedadController::class);
Route::resource('imagenes', ImagenController::class);
Route::resource('detalle-alquileres', DetalleAlquilerController::class);
Route::get('/propiedades/{id}', [PropiedadController::class, 'mostrar']);
Route::get('propiedades/tipo/{nombre_tipo}', [PropiedadController::class, 'obtenerPorTipo']);
