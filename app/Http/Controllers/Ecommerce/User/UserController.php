<?php

namespace App\Http\Controllers\Ecommerce\User;

use App\Http\Controllers\Controller;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {

    public function login(Request $request) {

        $user = User::where('cpfcnpj', $request->cpfcnpj)->first();
        if ($user) {
            if (Auth::loginUsingId($user->id)) {
                return redirect()->route('loja')->with('success', 'Bem-vindo(a)!');
            } else {
                return redirect()->back()->withErrors(['error' => 'Falha ao fazer login!']);
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'CPF ou CNPJ não encontrado!']);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('loja')->with('success', 'Até breve!');
    }
    
    public function create(Request $request) {

        $rules = [
            'nome'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:6',
            'cpfcnpj'   => 'required|string|max:255|unique:users,cpfcnpj',
        ];
    
        $messages = [
            'required'  => 'O campo :attribute é obrigatório.',
            'unique'    => 'O :attribute já está em uso.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $user = new User();
        $user->nome             = $request->nome;
        $user->email            = $request->email;
        $user->password         = Hash::make($request->password);
        $user->cpfcnpj          = $request->cpfcnpj;
        $user->data_nascimento  = $request->data_nascimento;
        $user->sexo             = $request->sexo;
        $user->celular          = $request->celular;
        $user->termos           = $request->termos;
        $user->ofertas          = $request->ofertas;
        $user->tipo             = $request->tipo;
        $user->cep              = $request->cep;
        $user->endereco         = $request->endereco;
        $user->loja             = $request->loja;
        $user->codigo           = $request->codigo;
        $user->save();

        Auth::login($user);

        return redirect()->route('loja')->with('success', 'Bem-vindo(a)!');
    }

    public function update(Request $request) {

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
        if (!empty($request->sexo)) {
            $user->sexo = $request->sexo;
        }
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('meusDados')->with('success', 'Dados atualizados com sucesso!');
    }

    // public function login_administrador() {
    //     if(isset(auth()->user()->id)) {
    //         return redirect()->route('admin_dashboard');
    //     }
    //     return view('dashboard.login');
    // }

    // public function logar_administrador(Request $request) {
    //     $credentials = $request->only(['email', 'password']);
    //     $credentials['password'] = $credentials['password'];
    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('admin_dashboard');
    //     } else {
    //         return redirect()->route('admin')->with(['error' => 'As credenciais fornecidas são inválidas!']);
    //     }
    // }

    // public function admin_dashboard() {
    //     return view('dashboard.index');
    // }

    // public function logoutCliente() {
    //     Auth::logout();
    //     return redirect()->route('loja');
    // }

    // public function perfil() {
    //     return view('dashboard.configuracoes.perfil');
    // }

    // public function atualizaPerfil(Request $request) {
    //     $user = User::find($request->id);
    //     if ($user) {
    //         if (!empty($request->nome)) {
    //             $user->nome = $request->nome;
    //         }
    //         if (!empty($request->email)) {
    //             $user->email = $request->email;
    //         }
    //         if (!empty($request->password)) {
    //             $user->password = Hash::make($request->password);
    //         }
    //         if (!empty($request->cpfcnpj)) {
    //             $user->cpfcnpj = $request->cpfcnpj;
    //         }
    //         if (!empty($request->celular)) {
    //             $user->celular = $request->celular;
    //         }
    //         if (!empty($request->cep)) {
    //             $user->cep = $request->cep;
    //         }
    //         if (!empty($request->endereco)) {
    //             $user->endereco = $request->endereco;
    //         }

    //         $user->save();
    //         $log = new LogController();
    //         $log->criaLog('Atualizou o próprio perfil');
    //         return redirect()->route('perfil')->with('success', 'Perfil atualizado com sucesso!');
    //     } else {
    //         return redirect()->route('perfil')->with('error', 'Tente novamente mais tarde!');
    //     }
    // }

    // public function usuarios($tipo) {
    //     $usuarios = User::where('tipo', $tipo)->get();

    //     return view('dashboard.empresa.usuarios', [
    //         'usuarios' => $usuarios
    //     ]);
    // }

    // public function excluiUsuario(Request $request) {
    //     $user = User::find($request->id);

    //     if (!$user) {
    //         return redirect()->back()->with('error', 'Usuário não encontrado.');
    //     }

    //     $user->delete();
    //     $log = new LogController();
    //     $log->criaLog('Excluiu o usuário: '.$user->nome.' com ID:'.$user->id);
    //     return redirect()->back()->with('success', 'Usuário excluído com sucesso!');
    // }

    // public function cadastraUsuario(Request $request, $id = null) {
    //     if($id) {
    //         $user = User::find($id);
    //         return view('dashboard.empresa.cadastro.cadastraUsuario', ['id' => $id, 'usuario' => $user]);
    //     }

    //     $user = User::find($request->id);
    //     if ($user) {
    //         if (!empty($request->nome)) {
    //             $user->nome = $request->nome;
    //         }
    //         if (!empty($request->email)) {
    //             $user->email = $request->email;
    //         }
    //         if (!empty($request->password)) {
    //             $user->password = Hash::make($request->password);
    //         }
    //         if (!empty($request->cpfcnpj)) {
    //             $user->cpfcnpj = $request->cpfcnpj;
    //         }
    //         if (!empty($request->celular)) {
    //             $user->celular = $request->celular;
    //         }
    //         if (!empty($request->data_nascimento)) {
    //             $user->data_nascimento = $request->data_nascimento;
    //         }
    //         if (!empty($request->sexo)) {
    //             $user->sexo = $request->sexo;
    //         }
    //         if (!empty($request->tipo)) {
    //             $user->tipo = $request->tipo;
    //             if($request->tipo == 4) {
    //                 $nome = explode(' ', $request->nome);
    //                 $user->codigo = $nome[0].mt_rand(1000, 9999);
    //             }
    //         }
    //         if (!empty($request->cep)) {
    //             $user->cep = $request->cep;
    //         }
    //         if (!empty($request->endereco)) {
    //             $user->endereco = $request->endereco;
    //         }
    //         if (!empty($request->codigo)) {
    //             $user->codigo = $request->codigo;
    //         }

    //         $user->loja = Auth::user()->loja;
    //         $user->save();

    //         return redirect()->route('cadastraUsuario', ['id' => $request->id])->with('success', 'Usuário atualizado com sucesso.');
    //     } else {
    //         $user = new User();
    //         $user->save();
    //         $id = $user->id;

    //         $user = User::find($id);
    //         return view('dashboard.empresa.cadastro.cadastraUsuario', ['id' => $id, 'usuario' => $user]);
    //     }
    // }

}
