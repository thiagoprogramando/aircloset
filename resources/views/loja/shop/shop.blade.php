@extends('layout')
@section('conteudo')
    <section class="section mt-5" id="women">
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Confira o que separamos para você!</h2>
                        <span>Escolha o seu look e arrase!</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($produtos as $produto)
                    <div class="col-lg-4 mb-5">
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="{{ route('produto', ['id' => $produto->id]) }}"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                @if ($produto->imagem)
                                    <div class="div-produto">
                                        <a href="{{ route('produto', ['id' => $produto->id]) }}"> <img class="img-produto" src="{{ asset($produto->imagem->file) }}"></a>
                                    </div>
                                @else
                                    <div class="div-produto">
                                        <a href="{{ route('produto', ['id' => $produto->id]) }}"> <img class="img-produto" src="{{ asset('loja/images/left-banner-image.jpg') }}"> </a>
                                    </div>
                                @endif
                            </div>
                            <div class="down-content">
                                <a href="{{ route('produto', ['id' => $produto->id]) }}">
                                    <h4>{{ $produto->titulo }}</h4>
                                    <span>R$ {{ number_format($produto->valor, 2, ',', '.') }}</span>
                                    {{-- <small class="text-primary">Disponivel na loja: <b>{{ $produto->loja->nome }}</b></small> --}}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
             </div>
        </div>
    </section>
@endsection
