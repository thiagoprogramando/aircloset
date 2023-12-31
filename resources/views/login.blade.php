@extends('layout')
@section('conteudo')
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="card col-lg-8 offset-lg-2 mt-5 mb-5 p-5">
                    <div class="section-heading text-center">
                        <h2>Bem-Vindo(a) ao AIR<b>CLOSET</b></h2>
                        <span>Preencha seus dados para acessar a plataforma.</span>
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
                    <form action="{{ route('login') }}" method="POST">
                        <div class="row">
                            @csrf
                            <div class="col-lg-6 offset-lg-3">
                                <input name="cpfcnpj" type="number" placeholder="CPF ou CNPJ" required>
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="main-dark-button"><i class="fa fa-plane"></i></button>
                            </div>
                            <div class="col-lg-12 text-center p-3">
                                <small>ou</small>
                            </div>
                            <div class="col-lg-6 offset-lg-3 text-center p-3">
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
