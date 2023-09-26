@extends('dashboard.layout')
    @section('conteudo')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Produtos Cadastrados</h1>
        </div>

        <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-3">
                                    <button class="btn btn-outline-info" type="button" data-toggle="modal" data-target="#exampleModal">FILTROS</button>
                                    <a class="btn btn-outline-primary" href="{{ route('cadastraProduto') }}">Cadastrar</a>
                                    <button class="btn btn-outline-success" type="button" id="exportar">EXCEL</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="tabela" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Título</th>
                                                <th>Descrição</th>
                                                <th>Loja</th>
                                                <th>Valor</th>
                                                <th class="text-center">Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($produtos as $key =>$produto)
                                            <tr>
                                                <td>{{ $produto->id }}</td>
                                                <td>{{ $produto->titulo }}</td>
                                                <td>{{ $produto->desc }}</td>
                                                <td>{{ $produto->nome_loja }}</td>
                                                <td>{{ $produto->valor }}</td>
                                                <td class="text-center">
                                                    <form action="{{ route('excluiProduto') }}" method="POST">
                                                        <input type="hidden" name="id" value="{{ $produto->id }}">
                                                        <input type="hidden" value={{  csrf_token() }} name="_token">
                                                        <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                                        <a class="btn btn-outline-warning" href="/cadastraProduto/{{ $produto->id }}"><i class="fa fa-pencil"></i></a>
                                                        <a class="btn btn-outline-primary" href="{{ $produto->id }}"><i class="fa fa-eye"></i></a>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('listaProduto') }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filtros:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value={{  csrf_token() }} name="_token">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="titulo" placeholder="Título, nome...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
