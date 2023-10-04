<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    public function listaCategoria() {
        return view('dashboard.estoque.listaCategoria', ['categorias' => Categoria::all()]);
    }

    public function cadastraCategoria(Request $request) {
        $imagem = $request->file('imagem');
        $nomeArquivo = uniqid('categoria_') . '.' . $imagem->getClientOriginalExtension();
        $caminhoImagem = $imagem->storeAs('public/categorias', $nomeArquivo);

        $categoria = new Categoria();
        $categoria->titulo = $request->input('titulo');
        $categoria->desc = $request->input('desc');
        $categoria->file = Storage::url($caminhoImagem);
        $categoria->save();

        $log = new LogController();
        $log->criaLog('Cadastrou categoria: '.$request->input('titulo'));

        return redirect()->back()->with('success', 'Categoria cadastrada com sucesso!');
    }

    public function excluiCategoria(Request $request) {
        $categoria = Categoria::find($request->id);

        if (!$categoria) {
            return redirect()->back()->with('error', 'Categoria não encontrada.');
        }

        $categoria->delete();

        $log = new LogController();
        $log->criaLog('Excluiu categoria: '.$categoria->titulo);
        return redirect()->route('listaCategoria')->with('success', 'Categoria excluída com sucesso.');
    }
}
