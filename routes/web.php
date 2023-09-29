<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CupomController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin', [UserController::class, 'login_administrador'])->name('admin');
Route::post('/admin', [UserController::class, 'logar_administrador'])->name('admin');

Route::middleware(['auth'])->group(function () {

    Route::get('admin_dashboard', [UserController::class, 'admin_dashboard'])->name('admin_dashboard');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/perfil', [UserController::class, 'perfil'])->name('perfil');
    Route::post('atualizaPerfil', [UserController::class, 'atualizaPerfil'])->name('atualizaPerfil');

    Route::get('/listaProduto', [ProdutoController::class, 'listaProduto'])->name('listaProduto');
    Route::post('/listaProduto', [ProdutoController::class, 'listaProduto'])->name('listaProduto');
    Route::get('/cadastraProduto/{id?}', [ProdutoController::class, 'cadastraProduto'])->name('cadastraProduto');
    Route::post('/dadosProduto', [ProdutoController::class, 'dadosProduto'])->name('dadosProduto');
    Route::post('/excluiProduto', [ProdutoController::class, 'excluiProduto'])->name('excluiProduto');
    Route::post('/aplicaCategoria', [ProdutoController::class, 'aplicaCategoria'])->name('aplicaCategoria');
    Route::post('/excluiCategoriaProduto', [ProdutoController::class, 'excluiCategoriaProduto'])->name('excluiCategoriaProduto');

    Route::post('/aplicaImagem', [ProdutoController::class, 'aplicaImagem'])->name('aplicaImagem');
    Route::post('/excluiImagem', [ProdutoController::class, 'excluiImagem'])->name('excluiImagem');

    Route::get('/listaCategoria', [CategoriaController::class, 'listaCategoria'])->name('listaCategoria');
    Route::post('/cadastraCategoria', [CategoriaController::class, 'cadastraCategoria'])->name('cadastraCategoria');
    Route::post('/excluiCategoria', [CategoriaController::class, 'excluiCategoria'])->name('excluiCategoria');

    Route::get('/usuarios/{tipo}', [UserController::class, 'usuarios'])->name('usuarios');
    Route::get('/cadastraUsuario/{id?}', [UserController::class, 'cadastraUsuario'])->name('cadastraUsuario');
    Route::post('/cadastraUsuario/{id?}', [UserController::class, 'cadastraUsuario'])->name('cadastraUsuario');
    Route::post('excluiUsuario', [UserController::class, 'excluiUsuario'])->name('excluiUsuario');

    Route::get('/cupom', [CupomController::class, 'index'])->name('cupom');
    Route::post('/cadastraCupom', [CupomController::class, 'cadastraCupom'])->name('cadastraCupom');
    Route::post('excluiCupom', [CupomController::class, 'excluiCupom'])->name('excluiCupom');
});

