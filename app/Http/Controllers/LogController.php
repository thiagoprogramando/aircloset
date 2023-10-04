<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function criaLog($atividade) {
        $log = new Log();
        $log->atividade = $atividade;
        $log->id_user = auth()->id();
        $log->save();
    }

    public function log() {
        if (Auth::user()->tipo == 1) {
            $logs = Log::with('user')->get();
        } else {
            $logs = Log::with('user')->where('id_user', Auth::id())->get();
        }

        return view('dashboard.configuracoes.log', ['logs' => $logs]);
    }
}
