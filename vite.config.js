import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        minify: 'terser',
        terserOptions: {
            compress: {
                drop_console: true, // Remove console.logs in production
            },
        },
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['axios'],
                },
            },
        },
        cssMinify: true,
        assetsInlineLimit: 4096, // Inline small assets as base64
    },
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
