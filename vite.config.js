import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/swiper.js', "resources/js/swiper.css"],
            refresh: true,
        }),
    ],
    optimizeDeps: {
        include: ['choices.js']
    },
    // Cấu hình để xử lý file SVG
    assetsInclude: ['**/*.svg'],
});
