<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{ asset('coreui/css/style.css') }}?v=1" rel="stylesheet">
        <link href="coreui/vendors/@coreui/icons/css/free.min.css" rel="stylesheet">
{{--        <link href="{{ asset('global_styles.css') }}?v=1" rel="stylesheet">--}}
        <title>Reseñas</title>

    </head>
    <body>

        <div id="listado_negocios_vue">

            <header class="header header-sticky mb-4">
                <div class="container-fluid">
                    <ul class="header-nav d-none d-md-flex" style="margin-left: auto; margin-right: auto;">
                        <li class="nav-item" ><a class="nav-link" href="/administrador" style="text-decoration: underline">Administrador</a></li>
                        <li class="nav-item"><a class="nav-link" href="/listado-negocios">Listado Negocios</a></li>
{{--                        <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>--}}
                    </ul>
                </div>
            </header>


            <div class="tab-content rounded-bottom">
                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-716">
                    <template v-for="negocio in listado_negocios">
                        <div class="card" @click="abrirNegocio(negocio)">
                            <div class="row g-0">
                                <div class="col-md-2 text-center" style="display: flex; align-items: center;">
                                    <img class="card-img" :src="negocio.foto" alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title" v-text="negocio.nombre"></h4>
                                        <p class="card-text mb-0" style="display: flex; align-items: center;"> <i class="cil-phone me-1"></i> <small class="text-medium-emphasis" v-text="negocio.telefono"></small></p>
                                        <p class="card-text" v-text="negocio.acerca_de"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                </div>

            </div>



        </div> <!--Fin div VUE -->

        <script src="coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>


    </body>

</html>

@vite(['resources/js/vue/listado_negocios.js'])
@vite(['public/css/global_styles.css'])

