var elixir = require('laravel-elixir');

process.env.DISABLE_NOTIFIER = true;

var vendor = "./resources/assets";

elixir(function (mix) {
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
    './node_modules/jquery-mask-plugin/dist/jquery.mask.js'
    // './node_modules/angular/angular.min.js',
    // './node_modules/angular-utils-pagination/dirPagination.js',
    // './node_modules/angular-animate/angular-animate.min.js',
    // vendor + '/js/custom.js',
    // vendor + '/js/app/locale/angular-locale_pt-br.js',
    // vendor + '/js/app/app.js',
    // vendor + '/js/app/Controllers/EstabelecimentoController.js',
    // vendor + '/js/app/Directives/Telefone.js'
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
    vendor + '/css/custom.css'
  ], 'public/css/admin.css')

  // Copy AdminLTE assets.
  mix.copy('./node_modules/font-awesome/fonts', 'public/fonts')
    .copy('./node_modules/admin-lte/bootstrap/dist/fonts', 'public/fonts')
    .copy('./node_modules/admin-lte/dist/img', 'public/img')
});

var gulp = require('gulp'),
  uglify = require('gulp-uglify'),
  server = require('gulp-live-server'),
  browserify = require('gulp-browserify'),
  rename = require('gulp-rename');

gulp.task('default', ['browserify', 'watch']);

gulp.task('watch', function() {
  gulp.watch('resources/assets/js/app/**/*.js', ['browserify']);
});

// gulp.task('serve', function(){
//   var serve = server.static('./public', 8000);
//   serve.start();
//   gulp.watch('public/js/**/*.js', function(file){
//     server.notify.apply(serve, [file]);
//   });
// });

gulp.task('browserify', function(){
  return gulp.src(['resources/assets/js/app/app.js'])
    .pipe(browserify())
    //.pipe(uglify())
    .pipe(rename('app.js'))
    .pipe(gulp.dest('public/js/'));
});