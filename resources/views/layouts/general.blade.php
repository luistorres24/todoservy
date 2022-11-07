<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('img/favicon.svg') }}" />
    <link href="{{ asset('coreui/css/style.css') }}?v=1" rel="stylesheet">
    <link href="{{ asset('coreui/vendors/@coreui/icons/css/free.min.css') }}?v=1" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title', 'Todoservy')</title>
    @yield('styles')

</head>

<body>

    <header class="header header-sticky mb-4" id="header-general">
        <div class="px-3" style="width: 100%">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('img/logo.svg') }}" alt="TodoServy">
                    </a>
                    {{--                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
                    {{--                        <span class="navbar-toggler-icon"></span>--}}
                    {{--                    </button>--}}
                    {{--                    <ul class="header-nav d-none d-md-flex justify-content-end">--}}
                    {{--                        <li class="nav-item" ><a class="nav-link" href="/administrador">Administrador</a></li>--}}
                    {{--                        <li class="nav-item"><a class="nav-link" href="/listado-negocios">Listado Negocios</a></li>--}}
                    {{--                        --}}{{--                        <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>--}}
                    {{--                    </ul>--}}
                    <div class="navbar-collapse justify-content-end collapse show" id="navbarSupportedContent" style="">
                        <ul class="navbar-nav mb-2 mb-lg-0">

                            <li class="nav-item" ><a class="nav-link" href="/administrador">Administrador</a></li>
                            <li class="nav-item"><a class="nav-link" href="/listado-negocios">Listado Negocios</a></li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    @yield('contenido')

    <script src="../coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="../js/jquery.min.js" type="text/javascript"></script>

@yield('scripts')

</body>
@vite(['public/css/global_styles.css'])


