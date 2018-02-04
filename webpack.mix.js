let mix = require('laravel-mix');
mix.browserSync('http://homestead.test');

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
   .copy('node_modules/materialize-css/dist', 'public')
   .copy('resources/assets/material-icons', 'public/material-icons')
   .copy('resources/assets/images', 'public/images')
   .sass('resources/assets/sass/app.scss', 'public/css');
