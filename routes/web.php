<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CupomController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


//Loja Sem AUTH
Route::get('/', [LojaController::class, 'loja'])->name('loja');
Route::get('/acessar', function () { return view('login'); })->name('acessar');
Route::post('/loginCliente', [LojaController::class, 'loginCliente'])->name('loginCliente');

Route::get('/cadastro/{codigo?}', [LojaController::class, 'cadastro'])->name('cadastro');
Route::post('/cadastraCliente', [LojaController::class, 'cadastraCliente'])->name('cadastraCliente');

Route::get('/sobre', function () { return view('loja.blog.about'); })->name('sobre');

Route::get('/produto/{id}', [ProdutoController::class, 'produto'])->name('produto');
Route::get('/catalogo/{categoria}', [LojaController::class, 'catalogo'])->name('catalogo');
Route::post('/listarCatalogo', [LojaController::class, 'catalogo'])->name('listarCatalogo');

//ADMIN sem AUTH
Route::get('/admin', [UserController::class, 'login_administrador'])->name('admin');
Route::post('/admin', [UserController::class, 'logar_administrador'])->name('admin');

Route::middleware(['auth'])->group(function () {

    //ADIM - Autenticado
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

    Route::get('/tag', [TagController::class, 'index'])->name('tag');
    Route::post('/cadastraTag', [TagController::class, 'cadastraTag'])->name('cadastraTag');
    Route::post('/excluiTag', [TagController::class, 'excluiTag'])->name('excluiTag');

    Route::get('/cupom', [CupomController::class, 'index'])->name('cupom');
    Route::post('/cadastraCupom', [CupomController::class, 'cadastraCupom'])->name('cadastraCupom');
    Route::post('excluiCupom', [CupomController::class, 'excluiCupom'])->name('excluiCupom');

    Route::get('/log', [LogController::class, 'log'])->name('log');

    //Loja - Autenticado
    Route::get('/logoutCliente', [UserController::class, 'logoutCliente'])->name('logoutCliente');
    Route::get('/meusDados', function () { return view('loja.cliente.dados'); })->name('meusDados');

    Route::post('/atualizaCliente', [LojaController::class, 'atualizaCliente'])->name('atualizaCliente');

});

