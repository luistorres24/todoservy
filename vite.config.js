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
                'resources/js/vue/negocios.js',
                //
                // 'public/css/global_styles.css',
            ],
            refresh: true,
        }),
    ],
});
