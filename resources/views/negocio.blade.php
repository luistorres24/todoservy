@extends('layouts.general')
@section('title', $negocio->nombre . ' - TodoServy')

@section('contenido')

    <div id="negocios_vue">

        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-negocio-individual mb-4 carta-individual">
                            <div style="display: flex">
                                <h1 class="mb-0" v-text="negocio.nombre"></h1>
                            </div>
                            <div class="my-3" style="text-align: center">
                                <img :src="'../' + negocio.foto" alt="" class="img-negocio">
                            </div>
                            <div>
                                <i class="cil-phone me-1"></i>
                                <span v-text="negocio.telefono"> </span>
                                <p v-text="negocio.acerca_de"></p>
                            </div>

                            <div class="body flex-grow-1 px-0">
                                    <div class="container-lg px-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="header-review">
                                                    <div style="display: flex; align-items: center">
                                                        <h5 class="card-title mb-0"> Reseñas</h5>
                                                        <div class="mx-2 card-total-calificaciones">

                                                            <span v-text="promedio_calificaciones"></span>
                                                            <i class="fas fa-star mx-1" style="color: gold"></i>
                                                            <span v-text="'(' + total_calificaciones +  (total_calificaciones > 1 ? ' reseñas)' : ' reseña)')" style="font-size: 11px; padding-top: 1px"></span>
                                                        </div>

                                                    </div>
                                                    <div class="btn-agregar-calificacion" style="display: flex; align-items: center" @click="abrirModalReview()">
                                                        <i class="cil-plus icon-agregar-review me-1"></i>
                                                        <span class="agregar-calificacion">Agregar reseña </span>
                                                    </div>

                                                </div>

                                                <div class="btn-agregar-calificacion-v2 mb-2" style="display: flex; align-items: center" @click="abrirModalReview()">
                                                    <i class="cil-plus icon-agregar-review me-1"></i>
                                                    <span class="agregar-calificacion">Agregar reseña </span>
                                                </div>

                                                <template v-if="calificaciones.length === 0">
                                                    <div style="padding: 0 5px;">
                                                        <span style="color: #808080"> - El negocio aún no tiene calificaciones </span>
                                                    </div>
                                                </template>
                                                <template v-for="calificacion in calificaciones">
                                                    <div class="card card-negocios card-review mb-2" style="cursor: default">
                                                        <div class="row">
                                                            <div class="col-md-1 text-center" style="display: flex; align-items: center;">
                                                                <img class="card-img" src="{{ asset('img/user.png') }}" alt="">
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="card-body">
                                                                    <h5 class="card-title" v-text="calificacion.nombre"></h5>
                                                                    <p class="card-text" v-text="calificacion.comentario"></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 contenedor-estrellas">
                                                                <star-rating :rating="calificacion.calificacion" :star-size="20" :read-only="true" :increment="0.01"> </star-rating>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
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
                            <form id="crearCalificacionForm">
                                <div class="form-group col-12">
                                    <label for="nombre" class="form-control-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre">
                                </div>

                                <div class="form-group col-12">
                                    <label for="comentario" class="form-control-label">Comentario</label>
                                    <textarea name="comentario" class="form-control" rows="4" style="resize: none;" placeholder="Cuentanos tu opinión"></textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label for="calificacion" class="form-control-label">Calificacion</label>
                                    <star-rating ref="inputCalificacion" :increment="0.1" :rounded-corners="true" ></star-rating>
                                </div>

                                <div class="form-group col-12">
                                    <button type="button" class="btn btn-primary btn-crear-negocio" @click="crearCalificacion"> GUARDAR
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

