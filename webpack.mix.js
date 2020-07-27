const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
require('laravel-mix-tailwind');
require('laravel-mix-purgecss');
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
.postCss('resources/css/app.css', 'public/css')
.options({
  processCssUrls: false,
  postCss: [ tailwindcss('./tailwind.config.js') ]
}).purgeCss({
    enabled: mix.inProduction(),
    folders: ['public', 'resources'],
    extensions: ['html', 'js', 'php', 'vue'],
});


if (mix.inProduction()) {
  mix
  .version();
}
