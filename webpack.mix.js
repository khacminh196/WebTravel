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
mix.webpackConfig({     
    output: {         
        chunkFilename: 'js/[name].js',     
    }, 
});

mix.copyDirectory('resources/assets', 'public/assets');
// mix.js('resources/js/app.js', 'public/js')
mix.sass('resources/sass/admin.scss', 'public/css');

// plugin
mix.scripts([
    'node_modules/toastr/build/toastr.min.js',
    'resources/js/toastr.js',
], 'public/js/toastr.min.js');
mix.scripts('node_modules/intl-tel-input/build/js/intlTelInput.min.js', 'public/js/intlTelInput.min.js');
mix.scripts('node_modules/intl-tel-input/build/js/utils.js', 'public/js/utils.js');

// css plugin
mix.postCss('node_modules/toastr/build/toastr.min.css', 'public/css/toastr.min.css');
mix.postCss('node_modules/intl-tel-input/build/css/intlTelInput.css', 'public/css/intlTelInput.css');