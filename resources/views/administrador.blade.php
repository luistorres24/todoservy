@extends('layouts.general')
@section('title', 'Administrador')
@section('contenido')
    <div id="admninistrador_vue">

        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <ul class="header-nav d-none d-md-flex" style="margin-left: auto; margin-right: auto;">
                    <li class="nav-item" ><a class="nav-link" href="/administrador">Administrador</a></li>
                    <li class="nav-item"><a class="nav-link" href="/listado-negocios" style="text-decoration: underline">Listado Negocios</a></li>
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

        {{--            <div>--}}
        {{--                <span class="mx-4">Negocios</span>--}}
        {{--                <button type="button" class="btn btn-primary mb-2" style="padding: 0 5px 0" data-coreui-toggle="modal" data-coreui-target="#staticBackdrop">Crear Nuevo Negocio</button>--}}
        {{--            </div>--}}



        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
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
                                    <tr class="align-middle" v-for="negocio in listado_negocios">
                                        <td class="text-center">
                                            <div class="avatar avatar-md"><img class="avatar-img" :src="negocio.foto" alt="foto"></div>
                                        </td>
                                        <td>
                                            <div v-text="negocio.nombre"></div>
                                            {{--                            <div><span>New</span> | Registered: Jan 1, 2020</div>--}}
                                        </td>
                                        <td>
                                            <div>
                                                <span v-text="negocio.acerca_de"></span>
                                            </div>

                                        </td>
                                        <td>
                                            <div>
                                                <span v-text="negocio.telefono"></span>
                                            </div>
                                        </td>
                                        <td>

                                            <a href="#" title="Editar" @click="abrirModalEditar(negocio)">
                                                <i class="icon-edit cil-pen"></i>
                                            </a>

                                            <a href="#" title="Eliminar" @click="eliminarNegocio(negocio.id)">
                                                <i class="icon-delete cil-trash"></i>
                                            </a>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
            </div>
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
                            <form id="crearNegocioForm">
                                <div class="form-group col-12">
                                    <label for="nombre" class="form-control-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="El nombre de tu negocio">
                                </div>
                                <div class="form-group col-12">
                                    <label for="telefono" class="form-control-label">Teléfono</label>
                                    <input type="number" class="form-control" name="telefono" placeholder="Teléfono celular">
                                </div>
                                <div class="form-group col-12">
                                    <label for="acerca_de" class="form-control-label">Acerca de</label>
                                    <textarea name="acerca_de" class="form-control" rows="4" style="resize: none;" placeholder="Cuentanos sobre tu negocio"></textarea>
                                </div>

                                <div class="form-group col-12">
                                        <span class="btn-agregar-foto" style="display: flex; align-items: center">
                                            <i class="cil-paperclip"></i>
                                            <label style="margin: 0 5px" for="upload-foto" ref="upload-foto" class="btn-agregar-foto" v-text="previewImage == null ? 'Agregar Foto' : 'Cambiar Foto'"></label>
                                            <input style="display: none" id="upload-foto" type="file" accept="image/*" class="btn-agregar-foto btn-file" @change=uploadImage>
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
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Modal Editar Negocio-->
        <div class="modal fade" id="modal-editar" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <form id="editarNegocioForm">
                                <div class="form-group col-12">
                                    <label for="nombre" class="form-control-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="El nombre de tu negocio" v-model="formNegocioEditar.nombre">
                                </div>
                                <div class="form-group col-12">
                                    <label for="telefono" class="form-control-label">Teléfono</label>
                                    <input type="number" class="form-control" name="telefono" placeholder="Teléfono celular" v-model="formNegocioEditar.telefono">
                                </div>
                                <div class="form-group col-12">
                                    <label for="acerca_de" class="form-control-label">Acerca de</label>
                                    <textarea name="acerca_de" class="form-control" rows="4" style="resize: none;" placeholder="Cuentanos sobre tu negocio" v-model="formNegocioEditar.acerca_de"></textarea>
                                </div>

                                <div class="form-group col-12">
                                        <span class="btn-agregar-foto" style="display: flex; align-items: center">
                                            <i class="cil-paperclip"></i>
                                            <label style="margin: 0 5px" for="upload-foto-editar" ref="upload-foto" class="btn-agregar-foto" v-text="formNegocioEditar.foto == null ? 'Agregar Foto' : 'Cambiar Foto'"></label>
                                            <input style="display: none" id="upload-foto-editar" type="file" accept="image/*" class="btn-agregar-foto btn-file" @change=uploadImage>
                                            <img :src="previewImage" class="uploading-image"  alt="" style="width: 25px"/>
                                        </span>

                                </div>

                                <div class="form-group col-12">
                                    <button type="button" class="btn btn-success btn-editar-negocio" @click="editarNegocio">GUARDAR
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

@vite(['resources/js/vue/administrador.js'])
@vite(['public/css/global_styles.css'])

