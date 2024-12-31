const mix = require('laravel-mix');

mix.sass('public/assets/frontend/scss/main.scss', 'public/assets/frontend/css')
   .options({
      processCssUrls: false
   });
