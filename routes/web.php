<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ColunistaController;
use App\Http\Controllers\FavoritoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/index', function () {
    return view('index');
});





Route::resource('usuarios', UsuarioController::class);

Route::resource('colunistas', ColunistaController::class);

Route::resource('favoritos', FavoritoController::class);

Route::get('usuarios/{id}/favoritos', [UsuarioController::class, 'favoritos']);


Route::middleware(['auth'])->group(function () {
   
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('colunistas', ColunistaController::class);
    Route::resource('favoritos', FavoritoController::class);
});
