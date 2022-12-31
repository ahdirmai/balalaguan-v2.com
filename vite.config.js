import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/sass/app.scss',
                "resources/css/core-ui/vendors/simplebar.css",
                "resources/css/core-ui/vendors/chartjs.css",
                "resources/css/core-ui/style.css",
                "resources/css/core-ui/example.css",
                "resources/js/core-ui/main.js",
                "resources/js/core-ui/vendors/coreui.bundle.min.js",
                "resources/js/core-ui/vendors/simplebar.min.js",
                'resources/css/brand/colors.css',
                'resources/css/app.css',
                'resources/js/scanner/main.js',
                'resources/js/pusher.js',
            ],
            refresh: true,
        }),
    ],
});
