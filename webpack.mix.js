const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
mix.js('resources/js/modules/login/login.js', 'public/js/modules/login');
mix.js('resources/js/modules/home/home.js', 'public/js/modules/home');
mix.js('resources/js/app/layout.js', 'public/js/app/layout');
mix.js('resources/js/modules/recepcao/recepcao.js', 'public/js/modules/recepcao');
mix.js('resources/js/modules/collaborator/collaborator.js', 'public/js/modules/collaborator');