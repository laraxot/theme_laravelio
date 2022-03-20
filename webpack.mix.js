const mix = require('laravel-mix');
var path = require("path");

mix.autoload({
    //jquery: ['$', 'jQuery', 'jquery', 'window.jQuery'],
    jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"],
    //tether: ['Tether', 'windows.Tether'],
    //Popper: ['popper', 'Popper', 'popper.js'],
    //popper: ['Popper', 'popper.js'],
    //'popper.js/dist/umd/popper.js': ['Popper']
});

mix.setPublicPath('Resources/views/dist');

mix.js('Resources/js/app.js', 'Resources/views/dist/js')
    .sourceMaps(true, 'hidden-source-map')
    .postCss('Resources/css/app.css', 'Resources/views/dist/css', [require('tailwindcss')])
    //.version()
    ;


    mix.extract([

        'axios',
        //'bootstrap-sass',
        'bootstrap',
        //'fastclick',
        'jquery',
        //'jquery-slimscroll',
        'lodash',

    ] /*, 'public/js/vendor.js' */ /*, __dirname + '/Resources/views/dist' */);


    var $from = './Resources/views/dist';
    var $to = '../../../public_html/themes/'+ path.basename(__dirname)+'/dist';
    console.log('from :' + $from);
    console.log('to :' + $to);

mix.copyDirectory($from, $to);

//console.log('----------------------------------------------------------------------------');
//console.log("__dirname:    ", __dirname);    // /mnt/d/var/www/base_geek/laravel/Themes/LaravelIo
//console.log("process.cwd() : ", process.cwd()); //  /mnt/d/var/www/base_geek/laravel/Themes/LaravelIo
//console.log("./ : ", path.resolve("./")); //    /mnt/d/var/www/base_geek/laravel/Themes/LaravelIo
//console.log("filename: ", __filename);  //  /mnt/d/var/www/base_geek/laravel/Themes/LaravelIo/webpack.mix.js

//console.log("path.dirname : ", path.dirname("./")); //
//console.log("path.dirname 1: ", path.dirname(__dirname)); //
//console.log("path.basename ", path.basename(__dirname));


