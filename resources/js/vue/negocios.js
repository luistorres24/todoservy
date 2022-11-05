import {createApp} from "vue/dist/vue.esm-bundler";
import axios from "axios";

const app = createApp({
    created() {
        // console.log(this.negocio.id)

        this.traerReviewsNegocio();
    },
    data(){
        return {
            negocio: {
                id: negocio_id,
                telefono: negocio_telefono,
                acerca_de: negocio_acerca_de,
                foto: negocio_foto,
            },
            reviews: [],

        }
    },
    methods:{

        traerReviewsNegocio(){
            axios.get('/traer-review-negocio',{
                params:{
                    id: this.negocio.id
                }
            }).then( response => {

                console.log("si entro bien")

            }).catch( error => {


            });
        },

    },
});

app.mount('#negocios_vue')
