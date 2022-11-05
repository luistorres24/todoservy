import {createApp} from "vue/dist/vue.esm-bundler";
import axios from "axios";

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
        }
    },
    methods:{
        uploadImage(e){
            const image = e.target.files[0];
            const reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = e =>{
                this.previewImage = e.target.result;
                // console.log(this.previewImage);
            };
        },
        traerNegocios(){
            axios.get('/traer-negocios').then( response => {
                this.listado_negocios = response.data;
            }).catch( error => {


            });
        },
        crearNegocio(){

            if(this.previewImage !== null){

                this.formNegocio.foto = this.previewImage;

            }

            let formulario = new FormData( document.getElementById('crearNegocioForm') );
            // formulario.append('id',this.idMensajeEditar);

            // $('#editar_mensaje_form')[0].reset();
            axios.post('/crear-negocio', formulario).then( response => {
                this.traerNegocios();
                $('#staticBackdrop').modal('hide');
            }).catch( error => {


            });



        },
        abrirModalEditar(negocio){

            this.formNegocioEditar.id = negocio.id;
            this.formNegocioEditar.nombre = negocio.nombre;
            this.formNegocioEditar.telefono = negocio.telefono;
            this.formNegocioEditar.acerca_de = negocio.acerca_de;
            this.formNegocioEditar.foto = negocio.foto;

            $('#modal-editar').modal('show');
        },
        editarNegocio(){

            if(this.previewImage !== null){
                this.formNegocioEditar.foto = this.previewImage;
            }

            let formulario = new FormData( document.getElementById('editarNegocioForm') );
            formulario.append('id',this.formNegocioEditar.id);
            formulario.append('foto',this.formNegocioEditar.foto);

            // $('#editar_mensaje_form')[0].reset();
            axios.post('/editar-negocio/' + this.formNegocioEditar.id, formulario).then( response => {
                this.traerNegocios();
                $('#modal-editar').modal('hide');
            }).catch( error => {


            });



        },

        eliminarNegocio(id_negocio){

            axios.delete('/eliminar-negocio/' + id_negocio,).then( response => {
                this.traerNegocios();
            }).catch( error => {


            });


        },


    }
});

app.mount('#admninistrador_vue')
