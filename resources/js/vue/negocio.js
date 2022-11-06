import {createApp} from "vue/dist/vue.esm-bundler";
import axios from "axios";

const app = createApp({
    created() {
        // console.log(this.negocio.id)

        this.traerCalificacionesNegocio();
    },
    data(){
        return {
            negocio: {
                id: negocio_id,
                nombre: negocio_nombre,
                telefono: negocio_telefono,
                acerca_de: negocio_acerca_de,
                foto: negocio_foto,
            },
            calificaciones: [],

        }
    },
    methods:{

        traerCalificacionesNegocio(){
            axios.get('/traer-calificacion-negocio',{
                params:{
                    id: this.negocio.id
                }
            }).then( response => {

                this.calificaciones = response.data;

            }).catch( error => {


            });
        },

        abrirModalReview(){
            $('#addReview').modal('show');
        },

        crearCalificacion(){

            let formulario = new FormData( document.getElementById('crearCalificacionForm') );
            formulario.append('id_negocio', this.negocio.id);


            axios.post('/crear-calificacion-negocio', formulario).then( response => {


                this.traerCalificacionesNegocio();

                $('#crearCalificacionForm')[0].reset();
                $('#addReview').modal('hide');
            }).catch( error => {


            });
        }

    },
});

app.mount('#negocios_vue')
