var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

process.env.DISABLE_NOTIFIER = true;

let dirs = {
    'vendor': "./resources/assets"
}

elixir(function(mix) {
    mix.sass('app.scss');

        // Compile AdminLTE scripts to single file.
    mix.scripts([
        './node_modules/admin-lte/plugins/jQuery/jquery-2.2.3.min.js',
        './node_modules/admin-lte/bootstrap/js/bootstrap.js',
        './node_modules/admin-lte/plugins/fastclick/fastclick.js',
        './node_modules/admin-lte/dist/js/app.js',
        './node_modules/admin-lte/plugins/sparkline/jquery.sparkline.js',
        './node_modules/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        './node_modules/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        './node_modules/admin-lte/plugins/slimScroll/jquery.slimscroll.js',
        './node_modules/admin-lte/plugins/chartjs/Chart.js',
        './node_modules/admin-lte/plugins/input-mask/jquery.inputmask.js',
        './node_modules/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js',
        './node_modules/admin-lte/plugins/datepicker/bootstrap-datepicker.js',
        './node_modules/admin-lte/plugins/datepicker/locales/bootstrap-datepicker.pt-BR.js',
        './node_modules/admin-lte/plugins/select2/select2.js',
        './node_modules/jquery-mask-plugin/dist/jquery.mask.js',
        dirs.vendor + '/js/custom.js'
    ], 'public/js/admin.js');

    // Compile AdminLTE to single file.
    mix.styles([
        './node_modules/admin-lte/bootstrap/css/bootstrap.min.css',
        './node_modules/font-awesome/css/font-awesome.css',
        './node_modules/admin-lte/plugins/select2/select2.css',
        './node_modules/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        './node_modules/admin-lte/dist/css/AdminLTE.css',
        './node_modules/admin-lte/dist/css/skins/_all-skins.css',
        './node_modules/admin-lte/plugins/datepicker/datepicker3.css',
        dirs.vendor + '/css/custom.css'
    ], 'public/css/admin.css')

    // Copy AdminLTE assets.
    mix.copy('./node_modules/font-awesome/fonts', 'public/fonts')
        .copy('./node_modules/admin-lte/bootstrap/dist/fonts', 'public/fonts')
        .copy('./node_modules/admin-lte/dist/img', 'public/img')
});
