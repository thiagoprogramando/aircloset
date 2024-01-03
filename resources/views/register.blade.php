@extends('layout')
@section('conteudo')
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="card col-lg-8 offset-lg-2 mt-5 mb-5 p-5">
                    <div class="section-heading text-center">
                        <h2>Bem-Vindo(a) a AIRCLOSET</h2>
                        <span>Informe seus dados para cadastrar-se na plataforma.</span>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <form id="subscribe" action="{{ route('cadastraCliente') }}" method="POST">
                        @csrf
                        <div class="row">
                            <input name="codigo" type="hidden" value="{{ $codigo }}">
                            <input name="tipo" type="hidden" value="3">
                            <div class="col-lg-6 offset-lg-3 mb-2">
                                <input name="nome" type="text" placeholder="Nome Completo" required>
                            </div>
                            <div class="col-lg-6 offset-lg-3 mb-2">
                                <input name="cpfcnpj" type="text" placeholder="CPF ou CNPJ" required>
                            </div>
                            <div class="col-lg-6 offset-lg-3 mb-2">
                                <input name="data_nascimento" type="text" placeholder="Data de Nascimento" required>
                            </div>
                            <div class="col-lg-6 offset-lg-3 mb-2">
                                <input name="email" type="email" placeholder="Email" required>
                            </div>
                            <div class="col-lg-6 offset-lg-3 mb-2">
                                <input name="celular" type="text" placeholder="Telefone" required>
                            </div>
                            <div class="col-lg-6 offset-lg-3 mb-2">
                                <input name="password" type="number" placeholder="Crie uma senha de 6 digitos" required>
                            </div>
                            <div class="col-lg-6 offset-lg-3 mb-2">
                                <button type="submit" class="register-button">Cadastrar-me</button>
                            </div>
                            <div class="col-lg-12 text-center p-1">
                                <small>ou</small>
                            </div>
                            <div class="col-lg-6 offset-lg-3 text-center">
                                <button class="btn-outline-facebook mb-2"><i class="fa fa-facebook"></i></button>
                                <button class="btn-outline-google"><i class="fa fa-google"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
