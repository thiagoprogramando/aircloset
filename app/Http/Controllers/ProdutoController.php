<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\CategoriaProduto;
use App\Models\Imagem;
use App\Models\Produto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function listaProduto(Request $request) {
        $filtroTitulo = $request->input('titulo');

        $produtos = DB::table('produto')
        ->leftJoin('users', 'produto.loja', '=', 'users.id')
        ->select('produto.*', 'users.nome as nome_loja')
        ->when($filtroTitulo, function ($query) use ($filtroTitulo) {
            return $query->where('produto.titulo', 'like', '%' . $filtroTitulo . '%');
        })
        ->get();
        return view('dashboard.estoque.listaProduto', ['produtos' => $produtos]);
    }

    public function cadastraProduto($id = null) {

        if($id == null) {
            $produto = new Produto();
            $produto->save();
            $id = $produto->id;
        }

        $produto = Produto::find($id);
        $imagens = Imagem::where('id_produto', $id)->get();
        $categorias = Categoria::all();
        $categorias_produto = CategoriaProduto::where('id_produto', $id)->get();

        return view('dashboard.estoque.cadastro.cadastraProduto', ['id' => $id, 'produto' => $produto, 'imagens' => $imagens, 'categorias' => $categorias, 'categorias_produto' => $categorias_produto]);
    }

    public function excluiProduto(Request $request) {
        $produto = Produto::find($request->id);

        if (!$produto) {
            return redirect()->back()->with('error', 'Produto não encontrado.');
        }

        $produto->delete();
        return redirect()->route('listaProduto')->with('success', 'Produto excluído com sucesso.');
    }

    public function dadosProduto(Request $request) {
        if (!empty($request->id)) {

            $produto = Produto::find($request->id);
            if ($produto) {
                if (!empty($request->titulo)) {
                    $produto->titulo = $request->titulo;
                }
                if (!empty($request->desc)) {
                    $produto->desc = $request->desc;
                }
                if (!empty($request->valor)) {
                    $produto->valor = $request->valor;
                }
                if (!empty($request->loja)) {
                    $produto->loja = $request->loja;
                }
                if (!empty($request->status)) {
                    $produto->status = $request->status;
                }
                if (!empty($request->sexo)) {
                    $produto->sexo = $request->sexo;
                }
                if (!empty($request->comprimento)) {
                    $produto->comprimento = $request->comprimento;
                }
                if (!empty($request->tecido)) {
                    $produto->tecido = $request->tecido;
                }

                $produto->save();
                return redirect()->back()->with('success', 'Produto cadastrado/atualizado com sucesso.');
            } else {
                return redirect()->route('listaProduto')->with('error', 'Produto não encontrado.');
            }
        } else {
            return redirect()->route('listaProduto')->with('error', 'Erro! Tente novamente mais tarde!');
        }
    }

    public function aplicaImagem(Request $request) {
        $imagem = $request->file('imagem');
        if ($imagem) {
            $nomeArquivo = uniqid('produto_') . '.' . $imagem->getClientOriginalExtension();
            $caminhoImagem = $imagem->storeAs('public/produtos', $nomeArquivo);

            $imagem = new Imagem();
            $imagem->id_produto = $request->input('id');
            $imagem->file = Storage::url($caminhoImagem);
            $imagem->save();

            return redirect()->back()->with('success', 'Imagem aplicada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Nenhuma imagem selecionada.');
        }
    }

    public function excluiImagem(Request $request) {
        $imagem = Imagem::find($request->id);

        if (!$imagem) {
            return redirect()->back()->with('error', 'Imagem não encontrada.');
        }

        $imagem->delete();
        if ($request->has('produto')) {
            return redirect()->route('cadastraProduto', ['id' => $request->produto])->with('success', 'Imagem excluída com sucesso.');
        } else {
            return redirect()->route('listaProduto')->with('success', 'Produto excluído com sucesso.');
        }
    }
    public function aplicaCategoria(Request $request) {

        $categoria = new CategoriaProduto();
        $categoria->id_produto = $request->input('id');
        $categoria->id_categoria = $request->input('categoria');
        $categoria->save();

        return redirect()->back()->with('success', 'Categoria aplicada com sucesso!');
    }

    public function excluiCategoriaProduto(Request $request) {
        $categoria = CategoriaProduto::find($request->id);

        if (!$categoria) {
            return redirect()->back()->with('error', 'Categoria não encontrado.');
        }

        $categoria->delete();
        if ($request->has('id')) {
            return redirect()->route('cadastraProduto', ['id' => $request->produto])->with('success', 'Categoria excluída com sucesso.');
        } else {
            return redirect()->route('listaProduto')->with('success', 'Categoria excluída com sucesso.');
        }
    }
}
