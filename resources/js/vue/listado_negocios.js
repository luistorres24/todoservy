import {createApp} from "vue/dist/vue.esm-bundler";
import axios from "axios";

const app = createApp({
    created() {
        this.traerNegocios();
    },
    data(){
        return {
            listado_negocios: [],
        }
    },
    methods:{

        traerNegocios(){
            axios.get('/traer-negocios').then( response => {
                this.listado_negocios = response.data;
            }).catch( error => {


            });
        },

        abrirNegocio(negocio){
            // window.open('/administrador');
            window.location.href = '/negocio/' + negocio.id;
        }

    }
});

app.mount('#listado_negocios_vue')
