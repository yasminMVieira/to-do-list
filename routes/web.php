<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TarefaController;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//     define automaticamente todas as rotas necessárias para um CRUD (index, create, store, edit, update, destroy).
//     Resource routes: 
//     GET /posts (index method)
//     GET /posts/create (create method)
//     POST /posts (store method)
//     GET /posts/{post} (show method)
//     GET /posts/{post}/edit (edit method)
//     PUT/PATCH /posts/{post} (update method)
//     DELETE /posts/{post} (destroy method)
Route::resource('categorias', CategoriaController::class);
Route::resource('tarefas', TarefaController::class);

require __DIR__.'/auth.php';
