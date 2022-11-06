@extends('layouts.general')
@section('contenido')
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


        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4 carta-individual">
                            <div>
                                <h1 v-text="negocio.nombre"></h1>
                            </div>
                            <div style="text-align: center">
                                <img :src="'../' + negocio.foto" alt="" style="max-width: 200px">
                            </div>
                            <div>
                                <i class="cil-phone me-1"></i>
                                <span v-text="negocio.telefono"> </span>
                                <p v-text="negocio.acerca_de"></p>
                            </div>
                            <div class="container-lg">

                                <div class="tab-content rounded-bottom">

                                    <div class="tab-pane p-5 active preview" role="tabpanel" id="preview-716">
                                        <div class="header-review">
                                            <h5 class="card-title"> Reseñas</h5>
                                            <div style="display: flex; align-items: center" @click="abrirModalReview()">
                                                <i class="cil-plus icon-agregar-review me-1"></i>
                                                <span>Agregar reseña </span>

                                            </div>

                                        </div>
                                        <div class="card card-review">
                                            <div class="row">
                                                <div class="col-md-1 text-center" style="display: flex; align-items: center;">
                                                    <img class="card-img" src="{{ asset('img/user.png') }}" alt="">
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <h5 class="card-title"> Usuario 1</h5>
                                                        <p class="card-text">
                                                            Le doy 4 estrellas por qué. En si la app es muy buena pero últimamente tengo problemas. Por qué estoy interesado en unos lotes, pero al momento de enviar mi pregunta al vendedor o negociar.
                                                            Me sale que error y intento muchas veces pero me sale lo mismo. A si que pedirles el favor si pueden corregir ese problema. Muchas gracias
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 contenedor-estrellas">
                                                    <i class="cil-star"></i>
                                                    <i class="cil-star"></i>
                                                    <i class="cil-star"></i>
                                                    <i class="cil-star"></i>
                                                    <i class="cil-star"></i>
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

        <!-- Modal Agregar Review-->
        <div class="modal fade" id="addReview" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    {{--                        <div class="modal-header">--}}
                    {{--                            <span class="modal-title" id="staticBackdropLabel" style="color: black">Crear Nuevo Negocio</span>--}}
                    {{--                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close" style="font-size: 12px"></button>--}}
                    {{--                        </div>--}}
                    <div class="modal-body">
                        <div class="row">
                            <form id="crearNegocioForm">
                                <div class="form-group col-12">
                                    <label for="nombre" class="form-control-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre">
                                </div>

                                <div class="form-group col-12">
                                    <label for="Comentario" class="form-control-label">Comentario</label>
                                    <textarea name="Comentario" class="form-control" rows="4" style="resize: none;" placeholder="Cuentanos tu opinión"></textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label for="acerca_de" class="form-control-label">Rating</label>
                                    <div class="contenedor-estrellas">
                                        <i class="cil-star"></i>
                                        <i class="cil-star"></i>
                                        <i class="cil-star"></i>
                                        <i class="cil-star"></i>
                                        <i class="cil-star"></i>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <button type="button" class="btn btn-primary btn-crear-negocio">GUARDAR
                                        <i class="btn-crear-negocio-label cil-arrow-right"></i>
                                    </button>
                                </div>

                                <div class="form-group col-12">
                                    <button type="button" class="btn btn-cerrar-modal" data-coreui-dismiss="modal">CERRAR
                                        <i class="btn-cerrar-modal-label cil-exit-to-app"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div> <!--Fin div VUE -->

@endsection
@section('scripts')
    <script type="text/JavaScript">
          //Variables globales para transportar la informacion del archivo blade al archivo vue negocio.js
        var negocio_id =          {{ $negocio->id }}
        var negocio_nombre =      "{{ $negocio->nombre }}"
        var negocio_telefono =    {{ $negocio->telefono }}
        var negocio_acerca_de =   "{{ $negocio->acerca_de }}"
        var negocio_foto =        "{{ $negocio->foto }}"
    </script>
@endsection


@vite(['resources/js/vue/negocio.js'])
@vite(['public/css/global_styles.css'])

