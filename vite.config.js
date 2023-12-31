import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import inject from "@rollup/plugin-inject";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/js/userHandling.js",
            ],
            refresh: true,
        }),
        inject({
            // => that should be first under plugins array
            $: "jquery",
            jQuery: "jquery",
        }),
    ],
});
