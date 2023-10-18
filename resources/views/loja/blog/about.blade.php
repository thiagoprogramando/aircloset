@extends('layout')
    @section('conteudo')
        <div class="page-heading about-page-heading" id="top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-content">
                            <h2>Aircloset</h2>
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
                            <h4>About Us &amp; Our Skills</h4>
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt ut labore.</span>
                            <div class="quote">
                                <i class="fa fa-quote-left"></i><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod kon tempor incididunt ut labore.</p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-location-arrow"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
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
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-location-arrow"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
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
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-location-arrow"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
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
