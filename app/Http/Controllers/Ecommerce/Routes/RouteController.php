<?php

namespace App\Http\Controllers\Ecommerce\Routes;

use App\Http\Controllers\Controller;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;

class RouteController extends Controller {
    
    public function index() {

        $produtosMasculinos  = Produto::where('sexo', 'M')->inRandomOrder()->limit(12)->with('imagem')->get();
        $produtosFemininos   = Produto::where('sexo', 'F')->inRandomOrder()->limit(12)->with('imagem')->get();
        $produtosOutros      = Produto::where('sexo', 'O')->inRandomOrder()->limit(12)->with('imagem')->get();
        $lojas               = User::where('tipo', 2)->get();
    
        return view('index', [
            'produtosMasculinos'  => $produtosMasculinos, 
            'produtosFemininos'   => $produtosFemininos, 
            'produtosOutros'      => $produtosOutros,
            'lojas'               => $lojas
        ]);
    }

    public function about() {

        return view('loja.blog.about');
    }

    public function register($code = null) {

        return view('register', ['codigo' => $code]);
    }

    public function login() {

        return view('login');
    }

}
