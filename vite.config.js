import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import legacy from '@vitejs/plugin-legacy';
import path from 'path';
import viteImagemin from 'vite-plugin-imagemin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        legacy({
            targets: ['defaults', 'not IE 11']
        }),
        viteImagemin({
            gifsicle: {
                interlaced: false,
            },
            mozjpeg: {
                quality: 75,
            },
            optipng: {
                enabled: true,
            },
            pngquant: {
                quality: [0.65, 0.9],
                speed: 4,
            },
            svgo: {
                plugins: [
                    { removeViewBox: false },
                    { removeEmptyAttrs: false },
                ],
            },
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
        },
    },
    build: {
        rollupOptions: {
            output: {
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        return id.toString().split('node_modules/')[1].split('/')[0].toString();
                    }
                }
            }
        }
    }
});
