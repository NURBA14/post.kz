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

mix.styles([
    "resources/front/css/main.css",
    "resources/front/css/bootstrap.css"
], "public/css/styles.css");


mix.js([
    "resources/front/js/bootstrap.bundle.min.js"
], "public/js/scripts.js");

mix.copy("resources/front/img", "public/img")


mix.disableNotifications();