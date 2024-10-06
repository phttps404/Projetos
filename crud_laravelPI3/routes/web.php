<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/cadastrar', [ProdutoController::class, 'cadastrar'])->name('cadastrar')->middleware('auth');
Route::post('/insere', [ProdutoController::class, 'insere'])->name('insere')->middleware('auth');
Route::get('/lista', [ProdutoController::class, 'lista'])->name('lista');
Route::get('/deletar/{id}', [ProdutoController::class, 'deletar'])->name('deletar')->middleware('auth');
Route::get('/edita/{id}', [ProdutoController::class, 'edita'])->name('edita')->middleware('auth');
Route::post('/atualizar/{id}', [ProdutoController::class, 'atualizar'])->name('atualizar')->middleware('auth');










Route::get('/produto/}', [ProdutoController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');





Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
