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
        <title>Negocios</title>

    </head>
    <body>

        <div id="negocios_vue">

            <header class="header header-sticky mb-4">
                <div class="container-fluid">
                    <ul class="header-nav d-none d-md-flex" style="margin-left: auto; margin-right: auto;">
                        <li class="nav-item" ><a class="nav-link" href="#">Administrador</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Listado Negocios</a></li>
{{--                        <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>--}}
                    </ul>
                </div>
{{--                <div class="header-divider"></div>--}}
{{--                <div class="container-fluid">--}}
{{--                    <nav aria-label="breadcrumb">--}}
{{--                        <ol class="breadcrumb my-0 ms-2">--}}
{{--                            <li class="breadcrumb-item">--}}
{{--                                <!-- if breadcrumb is single--><span>Home</span>--}}
{{--                            </li>--}}
{{--                            <li class="breadcrumb-item active"><span>Dashboard</span></li>--}}
{{--                        </ol>--}}
{{--                    </nav>--}}
{{--                </div>--}}
            </header>

            <div>
                <span class="mx-4">Negocios</span>
                <button type="button" class="btn btn-primary mb-2" style="padding: 0 5px 0" data-coreui-toggle="modal" data-coreui-target="#staticBackdrop">Crear Nuevo Negocio</button>
            </div>

            <div class="table-responsive">
                <table class="table border mb-0">
                    <thead class="table-light fw-semibold">
                    <tr class="align-middle">
                        <th class="text-center">
                            Foto
                        </th>
                        <th>Nombre Negocio</th>
                        <th>Acerca de</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="align-middle">
                        <td class="text-center">
                            <div class="avatar avatar-md"><img class="avatar-img" src="coreui/assets/img/avatars/1.jpg" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                        </td>
                        <td>
                            <div>Yiorgos Avraamu</div>
{{--                            <div><span>New</span> | Registered: Jan 1, 2020</div>--}}
                        </td>
                        <td>
                            <div>
                                <span>Panaderia</span>
                            </div>

                        </td>
                        <td>
                            3156605394
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Modal Crear Negocio-->
            <div class="modal fade" id="staticBackdrop" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
{{--                        <div class="modal-header">--}}
{{--                            <span class="modal-title" id="staticBackdropLabel" style="color: black">Crear Nuevo Negocio</span>--}}
{{--                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close" style="font-size: 12px"></button>--}}
{{--                        </div>--}}
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="nombre" class="form-control-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="El nombre de tu negocio">
                                </div>
                                <div class="form-group col-12">
                                    <label for="telefono" class="form-control-label">Teléfono</label>
                                    <input type="text" class="form-control" name="telefono" placeholder="Teléfono celular">
                                </div>
                                <div class="form-group col-12">
                                    <label for="acerca_de" class="form-control-label">Acerca de</label>
                                    <textarea name="acerca_de" class="form-control" rows="4" style="resize: none;" placeholder="Cuentanos sobre tu negocio"></textarea>
                                </div>

                                <div class="form-group col-12">
                                    <span class="btn-agregar-foto" style="display: flex; align-items: center">
                                        <i class="cil-paperclip"></i>
                                        <label style="margin: 0 5px" for="upload-foto" ref="upload-foto" class="btn-agregar-foto" v-text="previewImage == null ? 'Agregar Foto' : 'Cambiar Foto'"></label>
                                        <input style="display: none" id="upload-foto" type="file" accept="image/jpeg" class="btn-agregar-foto btn-file" @change=uploadImage>
                                        <img :src="previewImage" class="uploading-image"  alt="" style="width: 25px"/>
                                    </span>

                                </div>

                                <div class="form-group col-12">
                                    <button type="button" class="btn btn-primary btn-crear-negocio" @click="crearNegocio">GUARDAR
                                        <i class="btn-crear-negocio-label cil-arrow-right"></i>
                                    </button>
                                </div>

                                <div class="form-group col-12">
                                    <button type="button" class="btn btn-cerrar-modal" data-coreui-dismiss="modal">CERRAR
                                        <i class="btn-cerrar-modal-label cil-exit-to-app"></i>
                                    </button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div> <!--Fin div VUE -->

        <script src="coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>

    </body>

</html>

@vite(['resources/js/vue/negocios.js'])
@vite(['public/css/global_styles.css'])

