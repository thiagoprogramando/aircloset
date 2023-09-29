<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            return redirect()->route('admin')->with(['error' => 'As credenciais fornecidas são inválidas!']);
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

    public function perfil() {
        return view('dashboard.configuracoes.perfil');
    }

    public function atualizaPerfil(Request $request) {
        $user = User::find($request->id);
        if ($user) {
            if (!empty($request->nome)) {
                $user->nome = $request->nome;
            }
            if (!empty($request->email)) {
                $user->email = $request->email;
            }
            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }
            if (!empty($request->cpfcnpj)) {
                $user->cpfcnpj = $request->cpfcnpj;
            }
            if (!empty($request->celular)) {
                $user->celular = $request->celular;
            }
            if (!empty($request->cep)) {
                $user->cep = $request->cep;
            }
            if (!empty($request->endereco)) {
                $user->endereco = $request->endereco;
            }

            $user->save();
            return redirect()->route('perfil')->with('success', 'Perfil atualizado com sucesso!');
        } else {
            return redirect()->route('perfil')->with('error', 'Tente novamente mais tarde!');
        }
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

    public function cadastraUsuario(Request $request, $id = null)
    {
        if($id) {
            $user = User::find($id);
            return view('dashboard.empresa.cadastro.cadastraUsuario', ['id' => $id, 'usuario' => $user]);
        }

        $user = User::find($request->id);
        if ($user) {
            if (!empty($request->nome)) {
                $user->nome = $request->nome;
            }
            if (!empty($request->email)) {
                $user->email = $request->email;
            }
            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }
            if (!empty($request->cpfcnpj)) {
                $user->cpfcnpj = $request->cpfcnpj;
            }
            if (!empty($request->celular)) {
                $user->celular = $request->celular;
            }
            if (!empty($request->data_nascimento)) {
                $user->data_nascimento = $request->data_nascimento;
            }
            if (!empty($request->sexo)) {
                $user->sexo = $request->sexo;
            }
            if (!empty($request->tipo)) {
                $user->tipo = $request->tipo;
                if($request->tipo == 4) {
                    $nome = explode(' ', $request->nome);
                    $user->codigo = $nome[0].mt_rand(1000, 9999);
                }
            }
            if (!empty($request->cep)) {
                $user->cep = $request->cep;
            }
            if (!empty($request->endereco)) {
                $user->endereco = $request->endereco;
            }
            if (!empty($request->codigo)) {
                $user->codigo = $request->codigo;
            }

            $user->loja = Auth::user()->loja;
            $user->save();

            return redirect()->route('cadastraUsuario', ['id' => $request->id])->with('success', 'Usuário atualizado com sucesso.');
        } else {
            $user = new User();
            $user->save();
            $id = $user->id;

            $user = User::find($id);
            return view('dashboard.empresa.cadastro.cadastraUsuario', ['id' => $id, 'usuario' => $user]);
        }
    }
}
