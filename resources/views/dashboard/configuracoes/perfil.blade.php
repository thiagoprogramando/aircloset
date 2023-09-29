@extends('dashboard/layout')
    @section('conteudo')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Perfil</h1>
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
            <div class="col-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Meus dados</h6>
                    </div>

                    <div class="card-body">

                        <form id="cadastro" class="user" method="POST" action="{{ route('atualizaPerfil') }}">
                            <input type="hidden" value={{  csrf_token() }} name="_token">
                            <input type="hidden" value="{{Auth::user()->id}}" name="id">
                            <div class="row">
                                <div class="col-sm-12 col-lg-8 offset-lg-2 row">
                                    <div class="form-group col-sm-12 col-lg-6">
                                        <input type="text" class="form-control form-control-user" name="nome" value="{{Auth::user()->nome}}" placeholder="Nome">
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-6">
                                        <input type="text" class="form-control form-control-user" name="cpfcnpj" value="{{Auth::user()->cpfcnpj}}" placeholder="CPF/CNPJ">
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-6">
                                        <input type="text" class="form-control form-control-user" name="email" value="{{Auth::user()->email}}" placeholder="Email">
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-6">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="*******">
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-6">
                                        <input type="number" class="form-control form-control-user" name="celular" value="{{Auth::user()->celular}}" placeholder="Celular">
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-6">
                                        <input type="number" class="form-control form-control-user" name="cep" value="{{Auth::user()->cep}}" placeholder="CEP">
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-12">
                                        <input type="text" class="form-control form-control-user" name="endereco" value="{{Auth::user()->endereco}}" placeholder="Endereço">
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-4 offset-lg-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-user btn-block"> Atualizar </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
    @endsection
