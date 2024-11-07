import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        // Dossier de sortie pour les fichiers compilés
        outDir: 'public/build',
        // Génération du manifest
        manifest: true,
        // Optimisation du build
        rollupOptions: {
            output: {
                manualChunks: undefined,
                // Génère des noms de fichiers avec hash pour le cache busting
                entryFileNames: `assets/[name].[hash].js`,
                chunkFileNames: `assets/[name].[hash].js`,
                assetFileNames: `assets/[name].[hash].[ext]`
            }
        },
        // Compression des assets
        minify: 'terser',
        // Source maps pour la production (optionnel, peut être mis à false)
        sourcemap: false
    },
    optimizeDeps: {
        include: ['prismjs'],
    },
    // Configuration pour le serveur de développement
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'localhost'
        }
    }
});