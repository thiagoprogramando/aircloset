<?php

use App\Http\Controllers\Ecommerce\Routes\RouteController;
use App\Http\Controllers\Ecommerce\User\UserController;



use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CupomController;
use App\Http\Controllers\Ecommerce\Produtos\ProdutoController as ProdutosProdutoController;
use App\Http\Controllers\ProdutoController;

use App\Http\Controllers\LogController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\TagController;

use Illuminate\Support\Facades\Route;


//Loja Sem AUTH
    Route::get('/', [RouteController::class, 'index'])->name('loja');
    Route::get('/sobre', [RouteController::class, 'about'])->name('sobre');
    Route::get('/cadastro/{codigo?}', [RouteController::class, 'register'])->name('cadastro');
    Route::get('/acessar', [RouteController::class, 'login'])->name('acessar');

    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::post('/cadastraCliente', [UserController::class, 'create'])->name('cadastraCliente');

    Route::get('/produto/{id}', [ProdutosProdutoController::class, 'view'])->name('produto');
    Route::get('/catalogo/{categoria}', [LojaController::class, 'catalogo'])->name('catalogo');
    Route::post('/listarCatalogo', [LojaController::class, 'catalogo'])->name('listarCatalogo');

    Route::get('/filtros', [LojaController::class, 'filtros'])->name('filtros');

    //ADMIN sem AUTH
    Route::get('/admin', [UserController::class, 'login_administrador'])->name('admin');
    Route::post('logon-admin', [UserController::class, 'logar_administrador'])->name('logon-admin');

Route::middleware(['auth'])->group(function () {

    Route::group(['prefix' => 'admin'], function () {

        Route::get('/app', [UserController::class, 'admin_dashboard'])->name('admin_dashboard');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/perfil', [UserController::class, 'perfil'])->name('perfil');
        Route::post('atualizaPerfil', [UserController::class, 'atualizaPerfil'])->name('atualizaPerfil');
        
        // Route::get('/listaProduto', [ProdutoController::class, 'listaProduto'])->name('listaProduto');
        // Route::post('/listaProduto', [ProdutoController::class, 'listaProduto'])->name('listaProduto');
        // Route::get('/cadastraProduto/{id?}', [ProdutoController::class, 'cadastraProduto'])->name('cadastraProduto');
        // Route::post('/dadosProduto', [ProdutoController::class, 'dadosProduto'])->name('dadosProduto');
        // Route::post('/excluiProduto', [ProdutoController::class, 'excluiProduto'])->name('excluiProduto');
        // Route::post('/aplicaCategoria', [ProdutoController::class, 'aplicaCategoria'])->name('aplicaCategoria');
        // Route::post('/excluiCategoriaProduto', [ProdutoController::class, 'excluiCategoriaProduto'])->name('excluiCategoriaProduto');

        // Route::post('/aplicaImagem', [ProdutoController::class, 'aplicaImagem'])->name('aplicaImagem');
        // Route::post('/excluiImagem', [ProdutoController::class, 'excluiImagem'])->name('excluiImagem');

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
    });

    //Loja - Autenticado
    Route::get('/logoutCliente', [UserController::class, 'logout'])->name('logoutCliente');
    Route::get('/meusDados', function () { return view('loja.cliente.dados'); })->name('meusDados');

    Route::post('/atualizaCliente', [LojaController::class, 'atualizaCliente'])->name('atualizaCliente');
});

