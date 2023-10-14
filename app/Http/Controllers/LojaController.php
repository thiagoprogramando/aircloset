<?php

namespace App\Http\Controllers;

use App\Models\Imagem;
use App\Models\Produto;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LojaController extends Controller
{
    public function loja() {
        $produtoMasculina = Produto::where('sexo', 'M')
            ->inRandomOrder()
            ->limit(12)
            ->get();

        $produtoMasculina->each(function ($produto) {
            $imagem = Imagem::where('id_produto', $produto->id)
                ->inRandomOrder()
                ->first();
            $loja = User::where('id', $produto->loja)->first();
            $produto->imagem = $imagem;
            $produto->loja = $loja;
        });

        $produtoFeminino = Produto::where('sexo', 'F')
            ->inRandomOrder()
            ->limit(12)
            ->get();

        $produtoFeminino->each(function ($produto) {
            $imagem = Imagem::where('id_produto', $produto->id)
                ->inRandomOrder()
                ->first();
            $loja = User::where('id', $produto->loja)->first();
            $produto->imagem = $imagem;
            $produto->loja = $loja;
        });

        $produtoOutro = Produto::where('sexo', 'O')
            ->inRandomOrder()
            ->limit(12)
            ->get();

        $produtoOutro->each(function ($produto) {
            $imagem = Imagem::where('id_produto', $produto->id)
                ->inRandomOrder()
                ->first();
            $loja = User::where('id', $produto->loja)->first();
            $produto->imagem = $imagem;
            $produto->loja = $loja;
        });

        return view('index', ['produtoMasculina' => $produtoMasculina, 'produtoFeminino' => $produtoFeminino, 'produtoOutro' => $produtoOutro]);
    }

    public function acessar() {
        return view('login');
    }

    public function logar(Request $request) {
        $credentials = $request->only(['email', 'password']);
        $credentials['password'] = $credentials['password'];
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->withErrors(['error' => 'As credenciais fornecidas são inválidas.']);
        }
    }

    public function cadastro() {
        return view('register');
    }

    public function register(Request $request) {

    }
}
