const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .browserSync('http://localhost/Proyecto1/public/ReqVisPDF'); // Cambia esta URL a la de tu servidor local
