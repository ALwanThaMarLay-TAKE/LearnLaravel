import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // input: ['resources/css/app.css', 'resources/js/app.js'], //for normal server side application
            input: ['resources/js/app.js'], //import css in js file for single page appliction like react
            refresh: true,
        }),
    ],
});
