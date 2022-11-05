<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{ asset('coreui/css/style.css') }}?v=1" rel="stylesheet">
        <link href="{{ asset('coreui/vendors/@coreui/icons/css/free.min.css') }}?v=1" rel="stylesheet">
{{--        <link href="coreui/vendors/@coreui/icons/css/free.min.css" rel="stylesheet">--}}
{{--        <link href="{{ asset('global_styles.css') }}?v=1" rel="stylesheet">--}}
        <title>Reseñas</title>

    </head>
    <body>

        <div id="negocios_vue">

            <header class="header header-sticky mb-4">
                <div class="container-fluid">
                    <ul class="header-nav d-none d-md-flex" style="margin-left: auto; margin-right: auto;">
                        <li class="nav-item" ><a class="nav-link" href="/administrador" style="text-decoration: underline">Administrador</a></li>
                        <li class="nav-item"><a class="nav-link" href="/listado-negocios">Listado Negocios</a></li>
{{--                        <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>--}}
                    </ul>
                </div>
            </header>


            <h1 v-text="negocio.id"> </h1>


        </div> <!--Fin div VUE -->


        <link href="{{ asset('coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}?v=1" rel="stylesheet">
        <script src="{{ asset('js/jquery.min.js') }}?v=1" type="text/javascript"></script>

        <script type="text/JavaScript">
          //Variables globales para transportar la informacion del archivo blade al archivo vue negocios.js
          var negocio_id =          {{ $negocio->id }}
          var negocio_telefono =    {{ $negocio->telefono }}
          var negocio_acerca_de =   "{{ $negocio->acerca_de }}"
          var negocio_foto =        "{{ $negocio->foto }}"
        </script>

    </body>

</html>

@vite(['resources/js/vue/negocios.js'])
@vite(['public/css/global_styles.css'])

