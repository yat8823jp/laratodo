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
    plugins: [
        sassGlobImports(),
        laravel({
            input: ['resources/scss/app.scss', 'resources/js/app.js'],
            postcss: {
                plugins: [
                    tailwindcss,
                    autoprefixer,
                ],
            },
            devSourcemap: true,
        refresh: true,
    }),
    ]
});
