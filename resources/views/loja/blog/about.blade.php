@extends('layout')
    @section('conteudo')
        <div class="page-heading about-page-heading" id="top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-content">
                            <h2>AIR<b>CLOSET</b> </h2>
                            <span>Um look, Uma escolha &amp; você estravagante!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left-image">
                            <img src="{{ asset('loja/images/about-left-image.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-content">
                            <h4>Quem Somos</h4>
                            <span>A primeira plataforma de Alugueis de Casacos e Roupas em Gramado.</span>
                            <div class="quote">
                                <i class="fa fa-quote-left"></i><p>Buscamos oferecer aos clientes o máximo de recursos para conforto e segurança nas viagens.</p>
                            </div>
                            <p>Somos a primeira loja e plataforma de aluguel de casacos em Gramado. Agora sua viagem para Gramado ficou leve e econômica com a AirCloset. Arrase nos looks e nas fotos e não passe frio. Você pode reservar pelo site ou ir direto a loja física. Possuímos uma nova unidade em Campos do Jordão."</p>
                            <ul>
                                <li><a href="https://www.facebook.com/airclosetgramado"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/airclosetgramado/"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="our-team">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h2>Nossas Lojas</h2>
                            <span>Encontre produtos próximos de você!</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team-item">
                            <div class="thumb">
                                <div class="hover-effect">
                                    <div class="inner-content">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-location-arrow"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <img src="{{ asset('loja/images/team-member-01.jpg') }}">
                            </div>
                            <div class="down-content">
                                <h4>Aircloset - Gramado/RS</h4>
                                <span>Loja 1</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="team-item">
                            <div class="thumb">
                                <div class="hover-effect">
                                    <div class="inner-content">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-location-arrow"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <img src="{{ asset('loja/images/team-member-02.jpg') }}">
                            </div>
                            <div class="down-content">
                                <h4>Aircloset - Campos do Jordão/RS</h4>
                                <span>Loja 2</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
