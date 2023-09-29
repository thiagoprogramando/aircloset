<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Aircloset - Administração</title>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.2/xlsx.full.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('templante/js/jquery.js') }}"></script>
        <link href="{{ asset('templante/css/sb-admin-2.css') }}" rel="stylesheet">

    </head>

    <body id="page-top">
        <div id="wrapper">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-plane"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Aircloset</div>
                </a>

                <hr class="sidebar-divider my-0">

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('admin') }}">
                        <i class="fas fa-chart-line"></i><span>Dashboard</span>
                    </a>
                </li>

                <hr class="sidebar-divider">

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePedidos" aria-expanded="true" aria-controls="collapsePedidos">
                        <i class="fas fa-cart-shopping"></i>
                        <span>Loja</span>
                    </a>
                    <div id="collapsePedidos" class="collapse" aria-labelledby="headingFinanceiro" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="#">Pedidos</a>
                            <a class="collapse-item" href="{{ route('cupom') }}">Cupom</a>
                            <a class="collapse-item" href="/usuarios/3">Clientes</a>
                            <a class="collapse-item" href="/usuarios/4">Afiliados</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduto" aria-expanded="true" aria-controls="collapseProduto">
                        <i class="fas fa-shirt"></i>
                        <span>Estoque</span>
                    </a>
                    <div id="collapseProduto" class="collapse" aria-labelledby="headingProduto" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('listaProduto') }}">Produtos</a>
                            <a class="collapse-item" href="#">P. Reservados</a>
                            <a class="collapse-item" href="{{ route('listaCategoria') }}">Categorias</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmpresa" aria-expanded="true" aria-controls="collapseEmpresa">
                        <i class="far fa-building"></i>
                        <span>Empresa/Usuários</span>
                    </a>
                    <div id="collapseEmpresa" class="collapse" aria-labelledby="headingEmpresa" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="/usuarios/1">Usuários</a>
                            <a class="collapse-item" href="/usuarios/2">Empresas</a>
                        </div>
                    </div>
                </li>

                <hr class="sidebar-divider d-none d-md-block">

                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>

            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            @php
                                $nomeCompleto = Auth::user()->nome;
                                $partesDoNome = explode(' ', $nomeCompleto);
                                $primeiroNome = $partesDoNome[0];
                                $segundoNome = $partesDoNome[1];

                                $horaAtual = date('H');
                                $saudacao = '';

                                if ($horaAtual >= 0 && $horaAtual < 12) {
                                    $saudacao = 'Bom dia';
                                } elseif ($horaAtual >= 12 && $horaAtual < 18) {
                                    $saudacao = 'Boa tarde';
                                } else {
                                    $saudacao = 'Boa noite';
                                }
                            @endphp
                            <p class="p mt-2">Olá, {{ $primeiroNome }}. {{ $saudacao }}!</p>
                        </div>

                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-info-circle fa-fw"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                    <div class="form-inline mr-auto w-100 navbar-search">
                                        <p class="p mt-2">Olá, {{ $primeiroNome }}. {{ $saudacao }}!</p>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Notificações
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">Setembro, 2023</div>
                                            <span class="font-weight-bold">Um novo relatório mensal está pronto para download!</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Não há mais nada aqui.</a>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $primeiroNome}} {{ $segundoNome }}</span>
                                    <img class="img-profile rounded-circle" src="@if(Auth::user()->sexo == 'M') {{ asset('templante/img/undraw_profile.svg') }} @else {{ asset('templante/img/undraw_profile_3.svg') }} @endif">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('perfil') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Perfil
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Log de Atividades
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Sair
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>

                    <div class="container-fluid">
                        @yield('conteudo')
                    </div>
                </div>

                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Aircloset {{ date('Y') }}</span>
                        </div>
                    </div>
                </footer>

            </div>
        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script src="{{ asset('templante/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('templante/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('templante/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('templante/js/sb-admin-2.min.js') }}"></script>
        <script>
             $(document).ready(function() {
                $('#exportar').click(function() {
                    var tabela = document.getElementById('tabela');
                    var wb = XLSX.utils.table_to_book(tabela, { sheet: 'Sheet 1' });
                    var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });

                    function s2ab(s) {
                        var buf = new ArrayBuffer(s.length);
                        var view = new Uint8Array(buf);
                        for (var i = 0; i < s.length; i++) {
                            view[i] = s.charCodeAt(i) & 0xFF;
                        }
                        return buf;
                    }

                    var blob = new Blob([s2ab(wbout)], { type: 'application/octet-stream' });
                    var url = URL.createObjectURL(blob);
                    var a = document.createElement('a');
                    a.href = url;
                    a.download = 'tabela.xlsx';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                    setTimeout(function() { URL.revokeObjectURL(url); }, 100);
                });
            });
        </script>

    </body>

</html>
