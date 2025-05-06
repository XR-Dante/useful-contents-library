import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    server: {
        host: '0.0.0.0', // Docker konteynerdan tashqariga ochish uchun
        port: 5173,      // Vite frontend porti
        hmr: {
            host: 'localhost', // Localhost orqali hot reload qilish
        },
    },
    plugins: [
        laravel({
            input: ['resources/js/app.js'], // Laravel Vite kirish fayli
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
