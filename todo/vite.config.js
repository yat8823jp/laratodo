import { defineConfig } from 'vite';
import tailwindcss from "tailwindcss";
import autoprefixer from 'autoprefixer';
import postcssNesting from "postcss-nesting";
import { resolve } from 'path';
import fs from "fs";
import handlebars from 'vite-plugin-handlebars';
import sassGlobImports from 'vite-plugin-sass-glob-import';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    css: {
        postcss: {
            plugins: [
                tailwindcss,
                autoprefixer,
            ],//オートプレフィックス付与
        },
        devSourcemap: true,//ソースマップを付与
    },
    plugins: [
        sassGlobImports(),
        laravel({
            // input: ['resources/css/app.css', 'resources/js/app.js'],
            input: [ 'assets/styles/app.scss', 'assets/scripts/app.js.' ],
            refresh: true,
        }),
    ],
    build: {
        outDir: './dist',
        assetsInlineLimit: 0,
        rollupOptions: {
            output: {
                assetFileNames: ( assetInfo ) => {
                    console.log( assetInfo );
                    let extType = assetInfo.name.split(".")[1];
                    if ( /gif|jpeg|jpg|png|svg|webp/i.test( extType ) ) {
                        extType = "img";
                    }
                    if ( /css/i.test( extType ) ) {
                        extType = "css";
                        return `assets/${extType}/main[extname]`;
                    }
                    return `assets/${extType}/[name][extname]`;
                },
                entryFileNames: `assets/js/[name].js`,
                chunkFileNames: `assets/js/app.js`,
            },
        }
    }
});
