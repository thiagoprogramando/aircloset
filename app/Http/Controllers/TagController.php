<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index() {
        $tags = Tag::all();

        return view('dashboard.configuracoes.tag', ['tags' => $tags]);
    }

    public function cadastraTag(Request $request) {
        $tag = new Tag();
        $tag->tag = $request->tag;
        $tag->cor = $request->cor;
        $tag->save();

        return redirect()->back()->with('success', 'Tag cadastrada com sucesso!');
    }

    public function excluiTag(Request $request) {
        $tag = Tag::find($request->id);

        if (!$tag) {
            return redirect()->back()->with('error', 'Tag não encontrada!');
        }

        $tag->delete();
        $log = new LogController();
        $log->criaLog('Excluiu a tag: '.$tag->tag.' com ID:'.$tag->id);

        return redirect()->back()->with('success', 'Tag excluída com sucesso!');
    }
}
