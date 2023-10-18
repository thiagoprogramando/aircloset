<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

        <title>Aircloset - AirCloset- Aluguel de casacos em Gramado e Campos dos Jordôes</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('loja/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('loja/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('loja/css/templatemo-hexashop.css') }}">
        <link rel="stylesheet" href="{{ asset('loja/css/owl-carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('loja/css/lightbox.css') }}">
    </head>
    <body>

    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="./" class="logo">
                            <img src="{{ asset('assets/logo.png') }}">
                        </a>

                        <ul class="nav">
                            <li class="scroll-to-section"><a href="./" class="active">Início</a></li>
                            <li class="scroll-to-section"><a href="{{ route('about') }}">Sobre</a></li>
                            <li class="scroll-to-section"><a href="#explore">Como funciona?</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Categorias</a>
                                <ul>
                                    @foreach($categorias_all as $categoria)
                                        <li><a href="#">{{ $categoria->titulo }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @if(auth()->check())
                                <li class="scroll-to-section"><a href="{{ route('cadastro') }}">Meus Dados</a></li>
                                <li class="scroll-to-section"><a href="{{ route('logoutCliente') }}">Sair</a></li>
                            @else
                                <li class="scroll-to-section"><a href="{{ route('cadastro') }}">Cadastro</a></li>
                                <li class="scroll-to-section"><a href="{{ route('acessar') }}">Entrar</a></li>
                            @endif
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    @yield('conteudo')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="{{ asset('assets/logo.png') }}">
                        </div>
                        <ul>
                            <li><a href="#">AirCloset - Aluguel de casacos, acessórios de inverno e itens de viagens.</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Franquias &amp; Lojas</h4>
                    <ul>
                        <li><a href="#">Seja um franqueado Aircloset</a></li>
                        <li><a href="#">Loja 1 - Gramado/RS</a></li>
                        <li><a href="#">Loja 2 - Campos do Jordão</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Links</h4>
                    <ul>
                        <li><a href="#">Termos de Uso</a></li>
                        <li><a href="#">Como funciona</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Ajuda &amp; Informações</h4>
                    <ul>
                        <li><a href="#">Trabalhe Conosco</a></li>
                        <li><a href="#">FAQ's</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2023 Hefesto Tecnologia & Aircloset. Todos os direitos reservados.
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('loja/js/jquery-2.1.0.min.js') }}"></script>
    <script src="{{ asset('loja/js/popper.js') }}"></script>
    <script src="{{ asset('loja/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('loja/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('loja/js/accordions.js') }}"></script>
    <script src="{{ asset('loja/js/datepicker.js') }}"></script>
    <script src="{{ asset('loja/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('loja/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('loja/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('loja/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('loja/js/slick.js') }}"></script>
    <script src="{{ asset('loja/js/lightbox.js') }}"></script>
    <script src="{{ asset('loja/js/isotope.js') }}"></script>
    <script src="{{ asset('loja/js/custom.js') }}"></script>
  </body>
</html>
