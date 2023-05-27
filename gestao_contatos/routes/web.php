<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


Route::get('/index', [ContatoController::class, 'index'])->name('contato.index');
Route::get('/create-contato', [ContatoController::class, 'create'])->name('contato.create');
Route::post('/store-contato', [ContatoController::class, 'store'])->name('contato.store');
Route::delete('/delete-contato/{id}', [ContatoController::class, 'destroy'])->name('contato.delete');
Route::get('/edit-contato/{id}', [ContatoController::class, 'edit'])->name('contato.edit');
Route::put('/update-contato/{id}', [ContatoController::class, 'update'])->name('contato.update');
Route::get('/show-contato/{id}', [ContatoController::class, 'show'])->name('contato.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
