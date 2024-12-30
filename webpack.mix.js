const mix = require('laravel-mix');

mix.sass('resources/assets/frontend/scss/main.scss', 'public/assets/frontend/css')
   .options({
      processCssUrls: false
   });
