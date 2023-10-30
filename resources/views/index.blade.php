@extends('layout')
@section('conteudo')
    <section class="section mt-5" id="women">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Novidades femininas</h2>
                        <span>Escolha o seu look e arrase!</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
                            @foreach ($produtoFeminino as $produto)
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
                                            <img class="img-produto" src="{{ asset('loja/images/left-banner-image.jpg') }}">
                                        </div>
                                        @endif
                                    </div>
                                    <div class="down-content">
                                        <h4>{{ $produto->titulo }}</h4>
                                        <span>R$ {{ number_format($produto->valor, 2, ',', '.') }}</span>
                                        <small>Disponivel na loja: <b>{{ $produto->loja->nome }}</b></small>
                                    </div>
                                    
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Novidades masculinas</h2>
                        <span>É hora de ficar pronto para o momento!</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                            @foreach ($produtoMasculina as $produto)
                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>
                                                <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        @if ($produto->imagem)
                                        <div class="div-produto">
                                            <img class="img-produto" src="{{ asset($produto->imagem->file) }}">
                                        </div>
                                        @else
                                        <div class="div-produto">
                                            <img class="img-produto" src="{{ asset('loja/images/left-banner-image.jpg') }}">
                                        </div>
                                        @endif
                                    </div>
                                    <div class="down-content">
                                        <h4>{{ $produto->titulo }}</h4>
                                        <span>R$ {{ number_format($produto->valor, 2, ',', '.') }}</span>
                                        <small>Disponivel na loja: <b>{{ $produto->loja->nome }}</b></small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Crianças e Outros</h2>
                        <span>Itens de viagem, Unissex e peças para Crianças!</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kid-item-carousel">
                        <div class="owl-kid-item owl-carousel">
                            @foreach ($produtoOutro as $produto)
                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>
                                                <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        @if ($produto->imagem)
                                        <div class="div-produto">
                                            <img class="img-produto" src="{{ asset($produto->imagem->file) }}">
                                        </div>
                                        @else
                                        <div class="div-produto">
                                            <img class="img-produto" src="{{ asset('loja/images/left-banner-image.jpg') }}">
                                        </div>
                                        @endif
                                    </div>
                                    <div class="down-content">
                                        <h4>{{ $produto->titulo }}</h4>
                                        <span>R$ {{ number_format($produto->valor, 2, ',', '.') }}</span>
                                        <small>Disponivel na loja: <b>{{ $produto->loja->nome }}</b></small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>ALUGUE & ARRASE</h2>
                        <span>Escolha o item que melhor se encaixa com o seu perfil, escolha às datas e a loja, depois
                            arrase no seu passeio!</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>O que você veste é como se apresenta ao mundo, especialmente hoje, quando os contatos humanos
                                são tão rápidos. Moda é linguagem instantânea.</p>
                        </div>
                        <p>A primeira plataforma de economia circular online de aluguel de casacos, botas e itens de viagem
                            no Brasil. Possuímos loja física em Gramado-RS e Campos de Jordão-SP.</p>
                        <div class="main-border-button">
                            <a href="#">Saiba Mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="leather">
                                    <h4>Casacos</h4>
                                    <span>Coleções para o inverno.</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="first-image">
                                    <img src="{{ asset('loja/images/casalsorrindo.png') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="second-image">
                                    <img src="{{ asset('loja/images/casalunissex.png') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="types">
                                    <h4>Vestidos, Botas e acessórios</h4>
                                    <span>Coleção para o seu look.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="social">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Blog</h2>
                        <span>Confira às novidades do Mercado em Gramado e Campos do Jordão/RS.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row images">
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Fashion</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="{{ asset('loja/images/instagram-01.jpg') }}">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>New</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="{{ asset('loja/images/instagram-02.jpg') }}">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Brand</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="{{ asset('loja/images/instagram-03.jpg') }}">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Makeup</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="{{ asset('loja/images/instagram-04.jpg') }}">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Leather</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="{{ asset('loja/images/instagram-05.jpg') }}">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Bag</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="{{ asset('loja/images/instagram-06.jpg') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
