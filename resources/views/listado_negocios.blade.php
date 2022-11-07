@extends('layouts.general')
@section('title', 'Listado Negocios')
@section('contenido')
    <div id="listado_negocios_vue">

        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <div class="col-md-12">
                        <template v-if="listado_negocios.length === 0">

                            <div class="card card-admin mb-1" style="cursor: default">

                                <div style="padding: 0 5px;">
                                    <span style="color: #808080"> Aún no se han creado negocios </span>
                                </div>
                            </div>

                        </template>
                        <template v-for="negocio in listado_negocios">
                            <div class="card card-admin card-negocios mb-1" @click="abrirNegocio(negocio)">
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
            </div>
        </div>



    </div> <!--Fin div VUE -->
@endsection

@vite(['resources/js/vue/listado_negocios.js'])

