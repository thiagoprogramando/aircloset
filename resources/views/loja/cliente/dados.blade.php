@extends('layout')
    @section('conteudo')
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="card col-lg-8 offset-lg-2 mt-5 mb-5 p-5">
                    <div class="text-center mb-3">
                        <h5>Mantenha seus dados atualizados!</h5>
                    </div>
                    <form id="subscribe" action="{{ route('atualizaCliente') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3 mb-2">
                                <input name="nome" type="text" placeholder="Nome Completo" value="{{ auth()->user()->nome }}">
                            </div>
                            <div class="col-lg-6 offset-lg-3 mb-2">
                                <input name="cpfcnpj" type="text" placeholder="CPF ou CNPJ" value="{{ auth()->user()->cpfcnpj }}">
                            </div>
                            <div class="col-lg-6 offset-lg-3 mb-2">
                                <input name="data_nascimento" type="text" placeholder="Data de Nascimento" value="{{ auth()->user()->data_nascimento }}">
                            </div>
                            <div class="col-lg-6 offset-lg-3 mb-2">
                                <input name="email" type="email" placeholder="Email" value="{{ auth()->user()->email }}">
                            </div>
                            <div class="col-lg-6 offset-lg-3 mb-2">
                                <input name="celular" type="number" placeholder="Telefone" value="{{ auth()->user()->celular }}">
                            </div>
                            <div class="col-lg-6 offset-lg-3 mb-2">
                                <input name="password" type="text" oninput="limitToSixDigits(this)" placeholder="Senha de 6 digitos (Opcional)">
                            </div>
                            <div class="col-lg-6 offset-lg-3 mb-2">
                                <button type="submit" class="register-button">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
