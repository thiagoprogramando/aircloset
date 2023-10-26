<?php

namespace App\Http\Controllers;

use App\Models\Imagem;
use App\Models\Produto;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function loginCliente(Request $request) {
        $user = User::where('cpfcnpj', $request->cpfcnpj)->first();

        if ($user) {
            if (Auth::loginUsingId($user->id)) {
                return redirect()->route('loja');
            } else {
                return redirect()->back()->withErrors(['error' => 'Falha ao fazer login!']);
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'CPF ou CNPJ não encontrado!']);
        }
    }

    public function cadastro($codigo = null) {
        return view('register', ['codigo' => $codigo]);
    }

    public function cadastraCliente(Request $request) {
        $user = new User();
        if (!empty($request->nome)) {
            $user->nome = $request->nome;
        }
        if (!empty($request->cpfcnpj)) {
            $user->cpfcnpj = $request->cpfcnpj;
        }
        if (!empty($request->dataNascimento)) {
            $user->data_nascimento = $request->data_nascimento;
        }
        if (!empty($request->email)) {
            $user->email = $request->email;
        }
        if (!empty($request->celular)) {
            $user->celular = $request->celular;
        }
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        Auth::login($user);

        return redirect()->route('loja');
    }

    public function atualizaCliente(Request $request) {
        $user = User::find($request->id);

        if (!empty($request->nome)) {
            $user->nome = $request->nome;
        }
        if (!empty($request->cpfcnpj)) {
            $user->cpfcnpj = $request->cpfcnpj;
        }
        if (!empty($request->data_nascimento)) {
            $user->data_nascimento = $request->data_nascimento;
        }
        if (!empty($request->email)) {
            $user->email = $request->email;
        }
        if (!empty($request->celular)) {
            $user->celular = $request->celular;
        }
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('meusDados')->with('success', 'Dados atualizados com sucesso!');
    }
}
