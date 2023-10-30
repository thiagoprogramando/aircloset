<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\CategoriaProduto;
use App\Models\Imagem;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function listaProduto(Request $request) {
        $filtroTitulo = $request->input('titulo');
        $filtroLoja = $request->input('loja');

        $produtos = DB::table('produto')
        ->leftJoin('users', 'produto.loja', '=', 'users.id')
        ->select('produto.*', 'users.nome as nome_loja')
        ->when($filtroTitulo, function ($query) use ($filtroTitulo) {
            return $query->where('produto.titulo', 'like', '%' . $filtroTitulo . '%');
        })
        ->when($filtroLoja, function ($query) use ($filtroLoja) {
            return $query->where('produto.loja', $filtroLoja);
        })
        ->get();
        return view('dashboard.estoque.listaProduto', ['produtos' => $produtos]);
    }

    public function cadastraProduto($id = null) {

        if($id == null) {
            $produto = new Produto();
            $produto->save();
            $id = $produto->id;

            $log = new LogController();
            $log->criaLog('Registrou o produto com ID: '.$id);
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

        $log = new LogController();
        $log->criaLog('Excluiu o produto com ID: '.$produto->id.' - Nome/Título: '.$produto->titulo);

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
                if (!empty($request->tamanho)) {
                    $produto->tamanho = $request->tamanho;
                }
                if (!empty($request->tecido)) {
                    $produto->tecido = $request->tecido;
                }

                $produto->save();

                $log = new LogController();
                $log->criaLog('Editou o produto com ID: '.$produto->id.' - Nome/Título: '.$produto->titulo);
                return redirect()->route('cadastraProduto', ['id' => $request->id])->with('success', 'Produto cadastrado/atualizado com sucesso.');
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

            $log = new LogController();
            $log->criaLog('Aplicou imagem no produto com ID: '.$request->input('id'));
            return redirect()->route('cadastraProduto', ['id' => $request->id])->with('success', 'Imagem aplicada com sucesso.');
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
        $log = new LogController();
        $log->criaLog('Excluiu imagem no produto com ID: '.$request->produto);
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
        $log = new LogController();
        $log->criaLog('Aplicou categoria no produto com ID: '.$request->input('id'));
        return redirect()->route('cadastraProduto', ['id' => $request->id])->with('success', 'Categoria aplicada com sucesso.');
    }

    public function excluiCategoriaProduto(Request $request) {
        $categoria = CategoriaProduto::find($request->id);

        if (!$categoria) {
            return redirect()->route('cadastraProduto', ['id' => $request->produto])->with('error', 'Categoria não encontrado.');
        }

        if ($request->has('id')) {
            $categoria->delete();
            $log = new LogController();
            $log->criaLog('Excluiu categoria no produto com ID: '.$request->produto);
            return redirect()->route('cadastraProduto', ['id' => $request->produto])->with('success', 'Categoria excluída com sucesso.');
        } else {
            return redirect()->route('cadastraProduto', ['id' => $request->produto])->with('error', 'Erro ao excluir Categoria.');
        }
    }

    public function produto($id) {
        $produto = Produto::find($id);
        $produtoSemelhantes = Produto::where('loja', $produto->loja)->where('sexo', $produto->sexo)->take(3)->inRandomOrder()->get();
        $produtoSemelhantes->each(function ($produto) {
            $imagem = Imagem::where('id_produto', $produto->id)
                ->inRandomOrder()
                ->first();
            $produto->imagem = $imagem;
        });
        $loja = User::where('id', $produto->loja)->first();
        $imagens = Imagem::where('id_produto', $produto->id)->get();

        return view('loja.shop.singleProduct', ['produto' => $produto, 'loja' => $loja, 'imagens' => $imagens, 'produtoSemelhantes' => $produtoSemelhantes]);
    }
}
