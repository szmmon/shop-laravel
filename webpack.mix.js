const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/userHandling.js", "public/js")
    .js("resources/js/bootstrap.js", "public/js")
    .js("resources/js/welcome.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .postCss("resources/css/cart.css", "public/css")
    .postCss("resources/css/welcome.css", "public/css")
    .copy(
        "node_modules/@fortawesome/fontawesome-free/webfonts",
        "public/webfonts"
    );

mix.browserSync("shop.test");
