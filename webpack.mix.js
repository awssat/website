const mix = require("laravel-mix");
require("laravel-mix-jigsaw");

mix.disableSuccessNotifications();
mix.setPublicPath("source/assets/build");

mix.override((config) => {
    config.watchOptions = {
        ignored: /source\/_([a-z]+)\/_tmp/,
    };
});

mix.js("source/_assets/js/app.js", "js/")
    .css("source/_assets/css/app.css", "css/")
    .jigsaw({
        // watch: ["config.php", "source/**/*.md", "source/**/*.php", "source/**/*.css", "!source/**/_tmp/*.md", "!source/**/_tmp/**/*", "!source/**/_tmp"],
    })
    .options({
        processCssUrls: false,
        postCss: [require("tailwindcss")],
    })
    .sourceMaps()
    .version();
