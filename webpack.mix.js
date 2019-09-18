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
   .js('resources/js/backend.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .styles([
      'public/dsm_design/dist/css/main.css',
      'public/dsm_design/node_modules/font-awesome/css/font-awesome.min.css',
      'public/plugin/plugin/whatsapp-chat-support.css',
      'public/codeseven-toastr/build/toastr.min.css',
      'public/select2/dist/css/select2.min.css',
      'public/lightbox2-master/dist/css/lightbox.min.css',
      'public/css/app.css',
   ], 'public/css/app.css')
   .sass('resources/sass/backend.scss', 'public/css')
   .options({
      processCssUrls: false
   });
