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
var bowerPath = 'resources/assets/bower';
var appJsPath = 'resources/assets/js/';


elixir(function(mix) {
    mix.styles([
            'angular-chart.js/dist/angular-chart.css'
        ], 'public/css/mix-vendor.css',bowerPath)
        .styles([
            'style.css',
            'headerTopMenu.css',
            'index.css',
            'login.css',
            'jssor.css',
            'print.css'
        ], 'public/css/mix-app.css')
        .scripts([
            'jquery/dist/jquery.js',
            'angular/angular.js',
            'Chart.js/Chart.js',
            'angular-chart.js/angular-chart.js',
            'd3/d3.js',
            'moment/moment.js',
            'moment/locale/es.js',
            'noty/js/noty/packaged/jquery.noty.packaged.js'
        ], 'public/js/mix-vendor.js', bowerPath)
        .scripts([
            'config.js',
            'InitGallery.js',
            'topMenu.js',
            'customNoty.js',
            'angularApp.js'
        ], 'public/js/mix-app.js')
        .scripts([
            'Cart.js',
            'Category.js',
            'Sell.js',
            'User.js',
            'Product.js',
            'UserSession.js'
        ], 'public/js/mix-services.js', appJsPath+'Services')
        .scripts([
            'CartCtrl.js',
            'CategoryCtrl.js',
            'ProductCtrl.js',
            'SellCtrl.js'
        ], 'public/js/mix-controllers.js', appJsPath+'Controllers')
        .version([
            "css/mix-vendor.css",
            "css/mix-app.css",
            "js/mix-vendor.js",
            "js/mix-app.js",
            "js/mix-controllers.js",
            "js/mix-services.js",
        ]);
});