import { defineConfig } from 'vite';
import jigsaw from '@tighten/jigsaw-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { ViteImageOptimizer } from 'vite-plugin-image-optimizer';

export default defineConfig({
    plugins: [
        jigsaw({
            input: [
                'source/_assets/js/app.js',
                'source/_assets/css/app.css',
            ],
            refresh: true,
        }),
        tailwindcss(),
        // Image optimization plugin - compresses images during build
        ViteImageOptimizer({
            // Test files to optimize
            test: /\.(jpe?g|png|gif|tiff|webp|svg|avif)$/i,

            // Exclude directories (e.g., node_modules)
            exclude: undefined,

            // Include directories
            include: undefined,

            // Include SVG optimization
            includePublic: true,

            // Log compression results
            logStats: true,

            // JPEG optimization options
            jpeg: {
                quality: 85,
                progressive: true,
            },

            // PNG optimization options
            png: {
                quality: 90,
            },

            // WebP optimization options
            webp: {
                quality: 85,
            },

            // SVG optimization options
            svg: {
                multipass: true,
                plugins: [
                    {
                        name: 'preset-default',
                        params: {
                            overrides: {
                                cleanupNumericValues: false,
                                removeViewBox: false, // Keep viewBox for responsive SVGs
                            },
                        },
                    },
                    'sortAttrs',
                    {
                        name: 'addAttributesToSVGElement',
                        params: {
                            attributes: [{ xmlns: 'http://www.w3.org/2000/svg' }],
                        },
                    },
                ],
            },

            // Cache optimization results
            cache: true,
            cacheLocation: 'node_modules/.cache/vite-plugin-image-optimizer',
        }),
    ],
    server: {
        watch: {
            usePolling: true,
        },
    },
});
