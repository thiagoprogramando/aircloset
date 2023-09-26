<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Aircloset - Administração</title>

    <link href="{{ asset('templante/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="{{ asset('templante/css/sb-admin-2.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6 mt-5">
                                <div class="p-5">
                                    <div class="text-center mb-2">
                                        <h1 class="h4 text-gray-900">Bem-vindo(a)!</h1>
                                        <small>Área restrita aos fornecedores.</small>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('admin') }}">
                                        <input type="hidden" value={{  csrf_token() }} name="_token">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" placeholder="E-mail">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Senha">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block"> Acessar
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">V 0.0.1</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('templante/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('templante/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('templante/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('templante/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
