let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .less('resources/assets/less/custom.less', 'public/css')
    .less('resources/assets/less/profile.less', 'public/css')
    .less('resources/assets/less/player/player2.less', 'public/css')
    .less('resources/assets/less/player/player.less', 'public/css')
    .less('resources/assets/less/shop/shop.less', 'public/css')
    .less('resources/assets/less/album.less', 'public/css')
    .less('resources/assets/less/events.less', 'public/css')
    .less('resources/assets/less/news.less', 'public/css')
    .less('resources/assets/less/movies.less', 'public/css')
    .less('resources/assets/less/video.less', 'public/css')
    .less('resources/assets/less/dasha/africa.less', 'public/css')
    .less('resources/assets/less/dasha/easy-carousel.less', 'public/css')
    .less('resources/assets/less/dasha/africa-map.less', 'public/css');

mix.version();