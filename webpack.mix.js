let mix = require('laravel-mix');

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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

mix.copy('resources/assets/css/custom/site/custom.css', 'public/assets/companies/site/css/custom.css');
mix.copyDirectory('resources/assets/css/custom/admin', 'public/assets/companies/admin');

mix.copyDirectory('resources/views/logos-app', 'public/storage/uploads/logos-app');


mix.copy('node_modules/systemjs/dist/system.js', 'public/js/systemjs/dist/system.js');
mix.copy('node_modules/jquery.maskedinput/src/jquery.maskedinput.js', 'public/js/plugins/jquery/jquery.maskedinput.js');
mix.copy('node_modules/devbridge-autocomplete/dist/jquery.autocomplete.min.js', 'public/js/plugins/jquery/jquery.autocomplete.min.js');

//Themes
//Admin
mix.copyDirectory('resources/views/themes/Metronic-v4.7.2/theme/assets', 'public/assets/companies/admin/theme');
//Site

mix.copyDirectory('resources/views/themes/stackhtml-133/Stack-1.3.3/js', 'public/assets/companies/site/theme/js');
mix.copyDirectory('resources/views/themes/stackhtml-133/Stack-1.3.3/fonts', 'public/assets/companies/site/theme/fonts');
mix.copyDirectory('resources/views/themes/stackhtml-133/Stack-1.3.3/img', 'public/assets/companies/site/theme/img');
