<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login_administrador() {
        if(isset(auth()->user()->id)) {
            return redirect()->route('admin_dashboard');
        }
        return view('dashboard.login');
    }

    public function logar_administrador(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $credentials['password'] = $credentials['password'];
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin_dashboard');
        } else {
            return redirect()->back()->withErrors(['email' => 'As credenciais fornecidas são inválidas.']);
        }
    }

    public function admin_dashboard() {
        return view('dashboard.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin');
    }

    public function usuarios($tipo) {
        $usuarios = User::where('tipo', $tipo)->get();

        return view('dashboard.empresa.usuarios', [
            'usuarios' => $usuarios
        ]);
    }

    public function excluiUsuario(Request $request) {
        $user = User::find($request->id);

        if (!$user) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }

        $user->delete();
        return redirect()->back()->with('success', 'Usuário excluído com sucesso!');
    }
}
