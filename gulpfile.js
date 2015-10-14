var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */


elixir(function(mix) {
    mix.styles([
            'style.css',
            'headerTopMenu.css',
            'index.css',
            'login.css',
            'jssor.css'
        ], 'public/css/all.css')
        .scripts([
            'jquery/dist/jquery.min.js'
        ], 'public/js/libraries.js', 'resources/assets/bower/')
        .scripts([
            'noty/js/noty/packaged/jquery.noty.packaged.js'
        ], 'public/js/noty.js', 'resources/assets/bower/')
        .scripts([
            'InitGallery.js',
            'topMenu.js',
            'customNoty.js'
        ], 'public/js/app.js')
        .version(["css/all.css","js/libraries.js","js/app.js"]);
});