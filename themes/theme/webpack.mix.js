let mix = require('laravel-mix');
mix.react('assets/src/js/app.js', 'assets/dist/')
.sass('assets/src/sass/app.sass', 'assets/dist/')
.browserSync({
    proxy: "starter-wordpress-theme.local",
    files: [
        "./assets/dist/*",
        "./assets/src/js/**/*.js",
        "./assets/src/sass/**/*.sass",
        "./assets/src/img/**/*.+(png|jpg|svg)",
        "./**/*.+(html|php)",
        "./views/**/*.+(html|twig)"
    ]
});

