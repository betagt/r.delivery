'use strict';

const elixir = require('laravel-elixir');

var node = './node_modules/';
var admin = node + 'admin-lte/';
var adminPlugins = admin + 'plugins/';
var assets = 'resources/assets/';
var tema = 'tema/';

elixir(function (mix) {
  mix.styles(
    [
      admin + 'bootstrap/css/bootstrap.min.css',
      node + 'font-awesome/css/font-awesome.css',
      adminPlugins + 'select2/select2.css',
      adminPlugins + 'jvectormap/jquery-jvectormap-1.2.2.css',
      admin + 'dist/css/AdminLTE.css',
      admin + 'dist/css/skins/_all-skins.css',
      adminPlugins + 'datepicker/datepicker3.css',
      'custom.css'
    ], 'public/css/admin.css');

  mix.scripts([
      adminPlugins + 'jQuery/jquery-2.2.3.min.js',
      admin + 'bootstrap/js/bootstrap.js',
      adminPlugins + 'fastclick/fastclick.js',
      admin + 'dist/js/app.js',
      adminPlugins + 'iCheck/icheck.js',
      adminPlugins + 'sparkline/jquery.sparkline.js',
      adminPlugins + 'jvectormap/jquery-jvectormap-1.2.2.min.js',
      adminPlugins + 'jvectormap/jquery-jvectormap-world-mill-en.js',
      adminPlugins + 'slimScroll/jquery.slimscroll.js',
      adminPlugins + 'chartjs/Chart.js',
      adminPlugins + 'input-mask/jquery.inputmask.js',
      adminPlugins + 'input-mask/jquery.inputmask.date.extensions.js',
      adminPlugins + 'datepicker/bootstrap-datepicker.js',
      adminPlugins + 'datepicker/locales/bootstrap-datepicker.pt-BR.js',
      adminPlugins + 'select2/select2.js',
      'custom.js'
    ], 'public/js/admin.js');

  mix.copy(assets + 'js/app', 'public/js/app');
  mix.browserify('./public/js/app/app.js');

  mix.copy(admin + 'dist/img', 'public/dist/img');
  mix.copy(assets + 'fonts', 'public/fonts');
});
