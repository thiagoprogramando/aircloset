@extends('layout')
@section('conteudo')
    <style>
        .carousel-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .carousel-slide {
            text-align: center;
        }

        .carousel-slide img {
            max-width: 100%;
            height: auto;
        }

        .buttons {
            cursor: pointer;
            background-color: transparent;
            border: none;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
        }

        #prevBtn, #nextBtn {
            margin-right: 10px;
        }

        .floating-whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .floating-whatsapp-button a {
            display: block;
            background-color: #25d366;
            color: #fff;
            text-align: center;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            font-size: 24px;
            line-height: 60px;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .floating-whatsapp-button a:hover {
            background-color: #128c7e;
        }

    </style>

    <div class="floating-whatsapp-button">
        <a href="https://api.whatsapp.com/send?phone=55{{$loja->celular}}" target="_blank">
            <i class="fa fa-lg fa-whatsapp"></i>
        </a>
    </div>

    <section class="section" id="product">
        <div class="container section-top">
            <div class="row">
                <div class="col-lg-4 offset-lg-2">
                    <div class="carousel-container">
                        <div class="left-images text-center">
                            @foreach ($imagens as $key => $imagem)
                                <div class="carousel-slide">
                                    <img src="{{ asset($imagem->file) }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="buttons">
                            <a id="prevBtn"><i class="fa fa-arrow-left"></i></a>
                            <a id="nextBtn"><i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>                
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4>{{ $produto->titulo }}</h4>
                        <span class="price">R$ {{ $produto->valor }}</span>
                        <span>{{ $produto->desc }}</span>
                        <div class="quote">
                            Tamanhos
                            <div class="d-flex">
                                <span class="badge bg-success text-white w-25 me-2">New</span>
                                <span class="badge bg-success text-white w-25 me-2">New</span>
                                <span class="badge bg-success text-white w-25 me-2">New</span>
                                <span class="badge bg-success text-white w-25 me-2">New</span>
                            </div>
                        </div>
                        <div class="quantity-content">
                            <!-- Componente Data aqui -->
                        </div>
                        <div class="total">
                            <h4>Total: R$ 114.00</h4>
                            <div class="main-border-button"><a href="#">Adicionar</a></div>
                        </div>
                        <div>
                            <p>Esse produto deve ser <b>retirado</b> em: <br> Loja: {{$loja->nome}} - {{ $loja->endereço }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="social">
        <div class="row">
            <div class="col-lg-8 offset-lg-3">
                <div class="container">
                    <div class="section-heading">
                        <h2>Você pode gostar!</h2>
                        <span>Confira às novidades do Mercado em Gramado e Campos do Jordão/RS.</span>
                    </div>

                    <div class="row images">
                        @foreach ($produtoSemelhantes as $key => $produto)
                            <div class="col-3">
                                <div class="thumb">
                                    <div class="icon">
                                        <a href="{{ route('produto', ['id' => $produto->id]) }}">
                                            <h6>{{$produto->titulo}}</h6>
                                            <i class="fa fa-cart-plus"></i>
                                        </a>
                                    </div>
                                    
                                    @if ($produto->imagem)
                                        <img class="img-semelhantes" src="{{ asset($produto->imagem->file) }}">
                                    @else
                                        <img class="img-semelhantes" src="{{ asset('loja/images/instagram-02.jpg') }}">
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <script>
        const prevButton = document.getElementById("prevBtn");
        const nextButton = document.getElementById("nextBtn");
        const slides = document.querySelectorAll(".carousel-slide");
        let currentSlide = 0;

        function showSlide(slideIndex) {
            if (slideIndex < 0) {
                currentSlide = slides.length - 1;
            } else if (slideIndex >= slides.length) {
                currentSlide = 0;
            }

            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slides[currentSlide].style.display = "block";
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
            currentSlide++;
        }

        function prevSlide() {
            showSlide(currentSlide - 1);
            currentSlide--;
        }

        nextButton.addEventListener("click", nextSlide);
        prevButton.addEventListener("click", prevSlide);

        showSlide(currentSlide);
    </script>
@endsection
