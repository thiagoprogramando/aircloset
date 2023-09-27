<?php

namespace App\Http\Controllers;

use App\Models\Cupom;
use Illuminate\Http\Request;

class CupomController extends Controller
{
    public function index() {
        $cupons = Cupom::all();

        return view('dashboard.loja.cupom', ['cupons' => $cupons]);
    }

    public function cadastraCupom(Request $request) {

        $verificaCupom = Cupom::where('codigo', $request->input('codigo'))->first();
        if($verificaCupom) {
            return redirect()->back()->with('error', 'Código já cadastrado!');
        }

        $cupom = new Cupom();
        $cupom->titulo = $request->input('titulo');
        $cupom->codigo = $request->input('codigo');
        $cupom->desconto = $request->input('desconto');
        $cupom->save();

        return redirect()->back()->with('success', 'CUPOM cadastrado com sucesso!');
    }

    public function excluiCupom(Request $request) {
        $cupom = Cupom::find($request->id);

        if (!$cupom) {
            return redirect()->back()->with('error', 'Cupom não encontrado.');
        }

        $cupom->delete();
        return redirect()->back()->with('success', 'Cupom excluído com sucesso!');
    }
}
