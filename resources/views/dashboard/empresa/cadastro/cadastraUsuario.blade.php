@extends('dashboard.layout')
@section('conteudo')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cadastro De Usuário/Empresa</h1>
        </div>

        @if(session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: `{{session('success')}}`,
                })
            </script>
        @endif

        @if(session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Atenção',
                    text: `{{session('error')}}`,
                })
            </script>
        @endif

        <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content">
                                    <h2>Informações do Usuário/Empresa</h2>
                                    <form method="POST" action="{{ route('cadastraUsuario') }}">
                                        <div class="row p-3">
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <input type="hidden" value={{ csrf_token() }} name="_token">
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ $usuario->nome }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <input type="number" name="cpfcnpj" class="form-control" placeholder="CPF/CNPJ" value="{{ $usuario->cpfcnpj }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $usuario->email }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control" placeholder="Senha">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <input type="number" name="celular" class="form-control" placeholder="celular" value="{{ $usuario->celular }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <input type="date" name="data_nascimento" class="form-control" placeholder="Data Nascimento/Abertura" value="{{ $usuario->data_nascimento }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control" name="tipo">
                                                        <option value="">Tipo</option>
                                                        <option value="1">Administrador</option>
                                                        <option value="2">Empresa</option>
                                                        <option value="3">Cliente</option>
                                                        <option value="4">Afiliado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control" name="sexo">
                                                        <option value="">Sexo</option>
                                                        <option value="M">Masculino</option>
                                                        <option value="F">Feminino</option>
                                                        <option value="O">Outros</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <input type="number" name="cep" class="form-control" placeholder="CEP" value="{{ $usuario->cep }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" name="endereco" class="form-control" placeholder="Endereço (Rua, Número etc...)" value="{{ $usuario->endereco }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group text-right">
                                                    <a href="{{ route('admin_dashboard') }}"
                                                        class="btn btn-danger">CANCELAR</a>
                                                    <button type="submit" class="btn btn-success">SALVAR DADOS</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
