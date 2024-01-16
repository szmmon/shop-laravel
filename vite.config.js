import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import inject from "@rollup/plugin-inject";
import path from "path-browserify";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/js/userHandling.js",
                "resources/js/welcome.js",
            ],
            refresh: true,
            resolve: {
                alias: {
                    path: "path-browserify",
                },
            },
        }),
        inject({
            // => that should be first under plugins array
            $: "jquery",
            jQuery: "jquery",
        }),
    ],
});
