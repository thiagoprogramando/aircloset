<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Imagem;
use App\Models\Produto;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LojaController extends Controller {


    public function catalogo(Request $request, $idCategoria = null) {

        $categoria = Categoria::find($idCategoria);

        if ($categoria) {
            $produtos = Produto::whereHas('categorias', function ($query) use ($idCategoria) {
                $query->where('id_categoria', $idCategoria);
            })->get();

            return view('loja.shop.shop', ['produtos' => $produtos]);
        }

        return false;

    }
}
