import {createApp} from "vue/dist/vue.esm-bundler";
import axios from "axios";
import swal from 'sweetalert';

const app = createApp({
    created() {
        this.traerNegocios();
    },
    data(){
        return {
            previewImage: null,
            formNegocio:{
                nombre: null,
                telefono: null,
                acerca_de: null,
                foto: null,
            },
            formNegocioEditar:{
                id: null,
                nombre: null,
                telefono: null,
                acerca_de: null,
                foto: null,
            },
            listado_negocios: [],
            editar_negocio: false,
        }
    },
    methods:{
        uploadImage(e){
            const image = e.target.files[0];
            const reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = e =>{
                this.previewImage = e.target.result;
                if(this.editar_negocio === true){
                    this.formNegocioEditar.foto = this.previewImage;
                }
                // console.log(this.previewImage);
            };

        },
        traerNegocios(){
            axios.get('/traer-negocios').then( response => {
                this.listado_negocios = response.data;
            }).catch( error => {
                swal('Error', 'No se han podido traer los negocios', 'info');
            });
        },
        crearNegocio(){
            this.editar_negocio = false;
            if(this.previewImage !== null){

                this.formNegocio.foto = this.previewImage;

            }

            let formulario = new FormData( document.getElementById('crearNegocioForm') );
            formulario.append('foto', this.formNegocio.foto);
            // formulario.append('id',this.idMensajeEditar);

            // $('#editar_mensaje_form')[0].reset();
            axios.post('/crear-negocio', formulario).then( response => {
                this.previewImage = null;
                $('#crearNegocioForm')[0].reset();
                this.traerNegocios();
                $('#staticBackdrop').modal('hide');
            }).catch( error => {
                const er = error.response.data.errors;
                let mensaje = 'Error';


                if( er.hasOwnProperty('nombre') ) {
                    mensaje = er.nombre[0];
                }else if( er.hasOwnProperty('acerca_de') ) {
                    mensaje = er.acerca_de[0];
                }else if( er.hasOwnProperty('telefono') ) {
                    mensaje = er.telefono[0];
                }else if( er.hasOwnProperty('foto') ) {
                    mensaje = er.foto[0];
                }

                swal('Error', mensaje, 'info');
            });



        },
        abrirModalEditar(negocio){

            this.formNegocioEditar.id = negocio.id;
            this.formNegocioEditar.nombre = negocio.nombre;
            this.formNegocioEditar.telefono = negocio.telefono;
            this.formNegocioEditar.acerca_de = negocio.acerca_de;
            this.formNegocioEditar.foto = negocio.foto;

            this.previewImage = null;
            this.editar_negocio = true;
            $('#modal-editar').modal('show');
        },
        editarNegocio(){


            let formulario = new FormData( document.getElementById('editarNegocioForm') );
            if(this.previewImage !== null){
                this.formNegocioEditar.foto = this.previewImage;
                formulario.append('foto_original', "false");
            }

            formulario.append('id', this.formNegocioEditar.id);
            formulario.append('foto', this.formNegocioEditar.foto);


            // $('#editar_mensaje_form')[0].reset();
            axios.post('/editar-negocio/' + this.formNegocioEditar.id, formulario).then( response => {
                this.traerNegocios();
                $('#modal-editar').modal('hide');
            }).catch( error => {
                const er = error.response.data.errors;
                let mensaje = 'Error';


                if( er.hasOwnProperty('nombre') ) {
                    mensaje = er.nombre[0];
                }else if( er.hasOwnProperty('acerca_de') ) {
                    mensaje = er.acerca_de[0];
                }else if( er.hasOwnProperty('telefono') ) {
                    mensaje = er.telefono[0];
                }else if( er.hasOwnProperty('foto') ) {
                    mensaje = er.foto[0];
                }

                swal('Error', mensaje, 'info');
            });



        },

        eliminarNegocio(id_negocio, nombre_negocio){

            swal({
                title: "¿Estás Seguro?",
                text: "Eliminarás el negocio '"+nombre_negocio + "'",
                icon: "warning",
                dangerMode: true,
                buttons: ["No, cancelar", "Sí, eliminar"]
            }).then((confirmacion) => {
                if (confirmacion) {
                    axios.delete('/eliminar-negocio/' + id_negocio,).then( response => {
                        this.traerNegocios();
                    }).catch( error => {
                        swal('Error', 'No se ha podido eliminar el negocio', 'info');
                    });
                }
            });

        },


    }
});

app.mount('#admninistrador_vue')
