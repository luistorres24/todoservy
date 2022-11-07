import {createApp} from "vue/dist/vue.esm-bundler";
import axios from "axios";
import StarRating from 'vue-star-rating'
import swal from "sweetalert";


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
            total_calificaciones: 0,
            promedio_calificaciones: 0,

        }
    },
    methods:{

        traerCalificacionesNegocio(){
            axios.get('/traer-calificacion-negocio',{
                params:{
                    id: this.negocio.id
                }
            }).then( response => {

                this.calificaciones = response.data.calificaciones;
                this.total_calificaciones = response.data.total_calificaciones;
                this.promedio_calificaciones = response.data.promedio_calificaciones;

            }).catch( error => {
                swal('Error', 'No se han podido traer las calificaciones de los negocios', 'info');
            });
        },

        abrirModalReview(){
            $('#addReview').modal('show');
        },

        crearCalificacion(){

            let formulario = new FormData( document.getElementById('crearCalificacionForm') );
            formulario.append('id_negocio', this.negocio.id);
            formulario.append('calificacion', this.$refs.inputCalificacion.selectedRating);

            axios.post('/crear-calificacion-negocio', formulario).then( response => {


                this.traerCalificacionesNegocio();

                $('#crearCalificacionForm')[0].reset();
                $('#addReview').modal('hide');
            }).catch( error => {
                const er = error.response.data.errors;
                let mensaje = 'Error';


                if( er.hasOwnProperty('nombre') ) {
                    mensaje = er.nombre[0];
                }else if( er.hasOwnProperty('comentario') ) {
                    mensaje = er.comentario[0];
                }else if( er.hasOwnProperty('calificacion') ) {
                    mensaje = er.calificacion[0];
                }

                swal('Error', mensaje, 'info');
            });
        },
        prueba(){
            console.log("jejej")
        }

    },
});


app.component('star-rating', StarRating);
app.mount('#negocios_vue')
