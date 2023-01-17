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
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.combine([
    'node_modules/jquery/dist/jquery.min.js'
],'public/js/jquery.js');