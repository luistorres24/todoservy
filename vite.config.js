import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue";


export default defineConfig({
    plugins: [
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                }
            }
        }),
        laravel({
            input: [

                'resources/css/app.css',
                'resources/js/app.js',

                // VUE
                'resources/js/vue/negocio.js',
                'resources/js/vue/listado_negocios.js',
                'resources/js/vue/administrador.js',
                //
                'public/css/global_styles.css',
            ],
            refresh: true,
        }),
    ],
});
