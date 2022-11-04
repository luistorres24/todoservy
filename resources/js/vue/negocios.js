import {createApp} from "vue/dist/vue.esm-bundler";
import axios from "axios";

const app = createApp({
    data(){
        return {
            previewImage: null,
            formNegocio:{
                nombre: null,
                telefono: null,
                acerca_de: null,
                foto: null,

            }
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
        crearNegocio(){

            if(this.previewImage !== null){

                this.formNegocio.foto = this.previewImage;

            }
            axios.post('/crear-negocio', this.formNegocio).then( response => {

                console.log(response);
            }).catch( error => {


            })

        }

    }
});

app.mount('#negocios_vue')
