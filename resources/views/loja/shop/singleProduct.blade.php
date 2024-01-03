@extends('layout')
@section('conteudo')

    <style>
        #imagemPrincipal {
            max-width: 80%;
            height: auto;
            margin-bottom: 10px;
        }

        .miniaturas {
            display: flex;
            justify-content: center;
        }

        .miniatura {
            max-width: 80px;
            margin: 0 5px;
            cursor: pointer;
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
                <div class="col-lg-4 offset-lg-2 text-center">
                    <img src="{{ asset($imagens->first()->file) }}" alt="Imagem Principal" id="imagemPrincipal">
                    <div class="miniaturas">
                        <div class="miniaturas">
                            @foreach($imagens as $imagem)
                                <img src="{{ asset($imagem->file) }}" alt="Miniatura" class="miniatura" data-imagem="{{ asset($imagem->file) }}">
                            @endforeach
                        </div>
                    </div>
                </div>                
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4>{{ $produto->titulo }}</h4>
                        <span class="price">R$ {{ $produto->valor }} - Diária</span>
                        <span>{{ $produto->desc }}</span>

                        <div class="quantity-content subscribe">
                            <form>
                                <input name="data" type="text" placeholder="Retirada / Devolução" required>
                            </form>
                        </div>

                        <div class="total">
                            <h4>Total: <b>R$ 114.00</b></h4>
                            <div class="main-border-button">
                                <a href="#">Adicionar</a>
                            </div>
                        </div>
                 
                        <p>Esse produto deve ser <b>retirado</b> em: <br> 
                            {{$loja->nome}} - <a href="">{{ $loja->endereço }}</a> 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var imagemPrincipal = document.getElementById('imagemPrincipal');
            var miniaturas = document.querySelectorAll('.miniatura');

            miniaturas.forEach(function (miniatura) {
                miniatura.addEventListener('click', function () {
                    var novaImagemSrc = this.getAttribute('data-imagem');
                    imagemPrincipal.src = novaImagemSrc;
                });
            });
        });
    </script>
@endsection
