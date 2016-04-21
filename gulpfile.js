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
// define("BOWER_PATH", "../../bower_components/");

//不生成 map
elixir.config.sourcemaps = false;

const BOWER_PATH = '../../bower_components/';
const ADMINLTE_BUILD_PATH = BOWER_PATH+'AdminLTE/build/';
const BUILD_PATH = 'resources/build/';
const PLUGINS = BOWER_PATH+'AdminLTE/plugins/';

elixir(function(mix) {
    mix.less([
        //adminLTE
        ADMINLTE_BUILD_PATH+'less/AdminLTE.less',
        //adminLTE theme
        ADMINLTE_BUILD_PATH+'less/skins/_all-skins.less',
        //icheck
        PLUGINS+'iCheck/all.css'
    ],'public/css/core.css');

    //js脚本
    mix.scripts([
        BOWER_PATH+'AdminLTE/plugins/jQuery/jQuery-2.2.0.min.js',
        BOWER_PATH+'AdminLTE/bootstrap/js/bootstrap.min.js',
        BOWER_PATH+'AdminLTE/dist/js/app.min.js',
        PLUGINS+'iCheck/icheck.min.js'
    ],'public/js/core.js');

    mix.version(['css/core.css','js/core.js']);
});
