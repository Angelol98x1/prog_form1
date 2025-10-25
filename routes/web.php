<?php

use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContactoController::class, 'index'])->name('contacto.index');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');
Route::get('/contactos', [ContactoController::class, 'listar'])->name('contacto.listar');

Route::get('/debug-vista', function () {
    // Verificar si las vistas existen
    $vistaFormulario = view()->exists('contacto.formulario');
    $vistaListar = view()->exists('contacto.listar');
    
    return response()->json([
        'vista_formulario_existe' => $vistaFormulario,
        'vista_listar_existe' => $vistaListar,
        'vistas_disponibles' => [
            'contacto.formulario' => $vistaFormulario ? 'EXISTE' : 'NO EXISTE',
            'contacto.listar' => $vistaListar ? 'EXISTE' : 'NO EXISTE'
        ]
    ]);
});