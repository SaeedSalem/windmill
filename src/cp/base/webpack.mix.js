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
    .vue()
    .js('node_modules/popper.js/dist/popper.js', 'public/js')
    .sourceMaps()
    .sass('resources/sass/app.scss', 'public/css')
    .copyDirectory('resources/img', 'public/img');

module.exports = {
    externalsType: 'script',
    externals: {
        lodash: ['https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js'],
    },
};

