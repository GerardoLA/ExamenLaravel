<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManzanaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//ruta para ver municipios
Route::get('/dashboard', [ManzanaController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

//insertar municipio
Route::get('/formInsertar', [ManzanaController::class, 'create'])->middleware(['auth', 'verified'])->name('formInsertar');
Route::post('/formInsertar', [ManzanaController::class, 'store'])->middleware(['before', 'after'])->name('formInsertar.store');
//modificar municipio
Route::get('/formUpdate/{manzana}', [ManzanaController::class, 'edit'])->middleware(['auth', 'verified'])->name('formUpdate');
Route::post('/formUpdate', [ManzanaController::class, 'update'])->middleware(['auth', 'verified'])->name('formUpdate.update');

//ruta eliminar
Route::post('/dashboard/{manzana}', [ManzanaController::class, 'destroy'])->middleware(['before', 'after'])->name('dashboard.eliminar');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
