@extends('dashboard.layout')
    @section('conteudo')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Usuários/Empresas</h1>
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
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-3">
                                    <a class="btn btn-outline-primary" href="{{ route('cadastraUsuario') }}">Cadastrar</a>
                                    <button class="btn btn-outline-success" type="button" id="exportar">EXCEL</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="tabela" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th class="text-center">Código Loja</th>
                                                <th>Email</th>
                                                <th>CPF/CNPJ</th>
                                                <th class="text-center">Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usuarios as $key =>$usuario)
                                            <tr>
                                                <td>{{ $usuario->id }}</td>
                                                <td>{{ $usuario->nome }}</td>
                                                <td class="text-center">{{ $usuario->loja }}</td>
                                                <td>{{ $usuario->email }}</td>
                                                <td>{{ $usuario->cpfcnpj }}</td>
                                                <td class="text-center">
                                                    <form action="{{ route('excluiUsuario') }}" method="POST">
                                                        <input type="hidden" value={{  csrf_token() }} name="_token">
                                                        <input type="hidden" value="{{ $usuario->id }}" name="id">
                                                        <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                                        <a class="btn btn-outline-warning" href="/cadastraUsuario/{{ $usuario->id }}"><i class="fa fa-pencil"></i></a>
                                                        @if($usuario->tipo == 4)
                                                            <button type="button" id="afiliado" data-link="{{ $usuario->codigo }}" class="btn btn-outline-success"><i class="fa fa-share-alt"></i></button>
                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('templante/js/usuarios.js') }}"></script>
@endsection
