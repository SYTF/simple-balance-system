var gulp = require('gulp');
var gulpUglify = require('gulp-uglify');
var gulpUglifyCSS = require('gulp-uglifycss');
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

gulp.task("copyfiles", function() {

  gulp.src("vendor/bower_dl/jquery/dist/jquery.js")
    .pipe(gulp.dest("resources/assets/js/"));

  gulp.src("vendor/bower_dl/bootstrap/less/**")
    .pipe(gulp.dest("resources/assets/less/bootstrap"));

  gulp.src("vendor/bower_dl/bootstrap/dist/js/bootstrap.js")
    .pipe(gulp.dest("resources/assets/js/"));

  gulp.src("vendor/bower_dl/bootstrap/dist/fonts/**")
    .pipe(gulp.dest("public/assets/fonts"));

  gulp.src("vendor/bower_dl/air-datepicker/dist/css/datepicker.min.css")
    .pipe(gulp.dest("resources/assets/css/"));

  gulp.src("vendor/bower_dl/air-datepicker/dist/js/datepicker.min.js")
    .pipe(gulp.dest("resources/assets/js/"));

  gulp.src("vendor/bower_dl/air-datepicker/dist/js/i18n/**")
    .pipe(gulp.dest("public/assets/js/i18n"));

  //vue
  gulp.src("vendor/bower_dl/vue/dist/vue.min.js")
    .pipe(gulp.dest("resources/assets/js/"));
  gulp.src("vendor/bower_dl/vue-resource/dist/vue-resource.min.js")
    .pipe(gulp.dest("resources/assets/js/"));

  //font-awesome
  gulp.src("vendor/bower_dl/components-font-awesome/css/font-awesome.min.css")
    .pipe(gulp.dest("resources/assets/css"));
  gulp.src("vendor/bower_dl/components-font-awesome/fonts/**")
    .pipe(gulp.dest("public/assets/fonts"));

});

elixir(function(mix) {
  mix.scripts([
      'js/jquery.js',
      'js/bootstrap.js',
      'js/vue.min.js',
      'js/vue-resource.min.js',
      'js/datepicker.min.js',
    ],
    'public/assets/js/site.js',
    'resources/assets'
  );

  // Compile Less
  mix.less('site.less', 'public/assets/css/site.css');

  mix.scripts([
      'css/datepicker.min.css',
      'css/font-awesome.min.css'
    ],
    'public/assets/css/siteOthers.css',
    'resources/assets'
  );
});
