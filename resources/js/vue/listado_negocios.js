import {createApp} from "vue/dist/vue.esm-bundler";
import axios from "axios";
import swal from "sweetalert";

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
                swal('Advertencia', 'No se han podido traer los negocios', 'info');
            });
        },

        abrirNegocio(negocio){
            window.location.href = '/negocio/' + negocio.id;
        }

    }
});

app.mount('#listado_negocios_vue')
