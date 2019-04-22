let mix = require('laravel-mix');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin = require('copy-webpack-plugin');
const imageminMozjpeg = require('imagemin-mozjpeg');

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

mix.webpackConfig({
   plugins: [
      new CopyWebpackPlugin([{
         from: 'resources/assets/images',
         to: 'images', // Laravel mix will place this in 'public/img'
      }]),
      new ImageminPlugin({
         test: /\.(jpe?g|png|gif|svg)$/i,
         plugins: [
            imageminMozjpeg({
               quality: 80,
            })
         ]
      })
   ]
});

mix.options({ extractVueStyles: true, processCssUrls: false });

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/bootstrap.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sourceMaps();
