@extends('dashboard.layout')
@section('conteudo')
    <style>
        .tabs {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: space-between;
        }

        .tabs li {
            flex-grow: 1;
            text-align: center;
            background-color: #f1f1f1;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .tabs a {
            text-decoration: none;
        }

        .tabs li.active {
            background-color: #ddd;
        }

        .tab-content {
            display: none;
        }

        .active-tab {
            display: block;
        }
    </style>

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cadastro De Produto</h1>
        </div>

        @if(session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: `{{session('success')}}`,
                })
            </script>
        @endif

        @if(session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Atenção',
                    text: `{{session('error')}}`,
                })
            </script>
        @endif

        <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <ul class="tabs">
                                    <li><a href="#" onclick="mostrarTab('dados')">Dados</a></li>
                                    <li><a href="#" onclick="mostrarTab('categorias')">Categorias</a></li>
                                    <li><a href="#" onclick="mostrarTab('imagens')">Imagens</a></li>
                                </ul>
                            </div>
                            <div class="col-12">
                                <div class="tab-content active-tab" id="dados">
                                    <h2>Informações do Produto #{{ $id }}</h2>
                                    <form method="POST" action="{{ route('dadosProduto') }}">
                                        <div class="row p-3">
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <input type="hidden" value={{ csrf_token() }} name="_token">
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" name="titulo" class="form-control"
                                                        placeholder="Título, nome, prévia..."
                                                        value="{{ $produto->titulo }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" name="desc" class="form-control"
                                                        placeholder="Descrição, Informações, Resumo..."
                                                        value="{{ $produto->desc }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <input type="number" name="valor" class="form-control"
                                                        placeholder="Valor" value="{{ $produto->valor }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <input type="number" name="loja" class="form-control"
                                                        placeholder="Código da Loja"
                                                        value="{{ isset($produto->loja) ? $produto->loja : Auth::user()->loja }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control" name="status">
                                                        <option value="" selected>Status do Produto</option>
                                                        <option value="1">Ativo (disponível)</option>
                                                        <option value="0">Inativo (indisponível)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control" name="sexo">
                                                        <option value="" selected>Sexo</option>
                                                        <option value="M">Masculino</option>
                                                        <option value="F">Feminino</option>
                                                        <option value="O">Outros</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <select class="form-control" name="comprimento">
                                                        <option value="" selected>Comprimento</option>
                                                        <option value="LG">Longuíssimo</option>
                                                        <option value="L">Longo</option>
                                                        <option value="M">Médio</option>
                                                        <option value="C">Curto</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <select class="form-control" name="tecido">
                                                        <option value="" selected>Tecido</option>
                                                        <option value="Matelasse">Matelasse</option>
                                                        <option value="Poliéster">Poliéster</option>
                                                        <option value="Sarja forrado">Sarja forrado</option>
                                                        <option value="Pelo">Pelo</option>
                                                        <option value="Camurça">Camurça</option>
                                                        <option value="Veludo">Veludo</option>
                                                        <option value="PVC">PVC</option>
                                                        <option value="Nylon">Nylon</option>
                                                        <option value="Lã sintética">Lã sintética</option>
                                                        <option value="Algodão">Algodão</option>
                                                        <option value="Couro">Couro</option>
                                                        <option value="Lã">Lã</option>
                                                        <option value="Malha">Malha</option>
                                                        <option value="Denim">Denim</option>
                                                        <option value="Viscose">Viscose</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="form-group">
                                                    <select class="form-control" name="tamanho">
                                                        <option value="" selected>Tamanho</option>
                                                        <option value="34">34</option>
                                                        <option value="35">35</option>
                                                        <option value="36">36</option>
                                                        <option value="37">37</option>
                                                        <option value="38">38</option>
                                                        <option value="2P">2P</option>
                                                        <option value="4">4</option>
                                                        <option value="6">6</option>
                                                        <option value="8">8</option>
                                                        <option value="10">10</option>
                                                        <option value="12">12</option>
                                                        <option value="3P">3P</option>
                                                        <option value="1P">1P</option>
                                                        <option value="P">P</option>
                                                        <option value="ÚNICO">ÚNICO</option>
                                                        <option value="39">39</option>
                                                        <option value="40">40</option>
                                                        <option value="42">42</option>
                                                        <option value="M">M</option>
                                                        <option value="46">46</option>
                                                        <option value="14">14</option>
                                                        <option value="16">16</option>
                                                        <option value="G">G</option>
                                                        <option value="GG">GG</option>
                                                        <option value="EGG">EGG</option>
                                                        <option value="PP">PP</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group text-right">
                                                    <a href="{{ route('listaProduto') }}"
                                                        class="btn btn-danger">CANCELAR</a>
                                                    <button type="submit" class="btn btn-success">SALVAR DADOS</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-content" id="categorias">
                                    <h2>Aplique Categorias</h2>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-12 mb-3">
                                            <form method="POST" action="{{ route('aplicaCategoria') }}">
                                                <input type="hidden" value={{ csrf_token() }} name="_token">
                                                <input type="hidden" name="id" value="{{ $produto->id }}">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-8">
                                                        <select class="form-control" name="categoria">
                                                            <option value="">Categorias</option>
                                                            @foreach ($categorias as $key => $categoria)
                                                                <option value="{{ $categoria->id }}">{{ $categoria->titulo }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-12 col-lg-4">
                                                        <button type="submit" class="btn btn-success">Aplicar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-sm-12 col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="tabela" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Categoria</th>
                                                            <th>Descrição</th>
                                                            <th class="text-center">Opções</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($categorias_produto as $key => $categoria)
                                                            <tr>
                                                                <td>{{ $categoria->id }}</td>
                                                                <td>{{ $categoria->categoria->titulo }}</td>
                                                                <td>{{ $categoria->categoria->desc }}</td>
                                                                <td class="text-center">
                                                                    <form action="{{ route('excluiCategoriaProduto') }}" method="POST">
                                                                        <input type="hidden" name="id" value="{{ $categoria->id }}">
                                                                        <input type="hidden" name="produto" value="{{ $produto->id }}">
                                                                        <input type="hidden" value={{ csrf_token() }} name="_token">
                                                                        <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content" id="imagens">
                                    <h2>Aplique Imagens</h2>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-12 mt-3 mb-3">
                                            <form method="POST" action="{{ route('aplicaImagem') }}" enctype="multipart/form-data">
                                                <input type="hidden" value={{ csrf_token() }} name="_token">
                                                <input type="hidden" name="id" value="{{ $id }}">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-8">
                                                        <input type="file" name="imagem" class="form-control" accept="image/*">
                                                    </div>

                                                    <div class="col-sm-12 col-lg-4">
                                                        <button type="submit" class="btn btn-success">Aplicar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-sm-12 col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="tabela" width="100%"
                                                    cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Prévia</th>
                                                            <th class="text-center">Opções</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($imagens as $key => $imagem)
                                                            <tr>
                                                                <td>{{ $imagem->id }}</td>
                                                                <td> <img class="img-prev" src="{{ asset($imagem->file) }}"> </td>
                                                                <td class="text-center">
                                                                    <form action="{{ route('excluiImagem') }}" method="POST">
                                                                        <input type="hidden" name="id" value="{{ $imagem->id }}">
                                                                        <input type="hidden" name="produto" value="{{ $produto->id }}">
                                                                        <input type="hidden" value={{ csrf_token() }} name="_token">
                                                                        <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            mostrarTab('dados');
        });

        function mostrarTab(tabId) {
            var tabContents = document.querySelectorAll('.tab-content');
            for (var i = 0; i < tabContents.length; i++) {
                tabContents[i].style.display = 'none';
            }

            var tabs = document.querySelectorAll('.tabs li');
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove('active');
            }

            document.getElementById(tabId).style.display = 'block';

            var clickedTab = document.querySelector('.tabs li[onclick="mostrarTab(\'' + tabId + '\')"]');
            $(clickedTab).addClass('active');
        }
    </script>
@endsection
