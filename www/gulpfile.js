var gulp = require('gulp'),
  sass = require('gulp-sass'),
  browserify = require('gulp-browserify'),
  concat = require('gulp-concat'),
  embedlr = require('gulp-embedlr'),
  refresh = require('gulp-livereload'),
  lrserver = require('tiny-lr')(),
  express = require('express'),
  livereload = require('connect-livereload'),
  imagemin = require('gulp-imagemin'),
  minifyCSS = require('gulp-minify-css'),
  prefix = require('gulp-autoprefixer'),
  bower = require('gulp-bower'),
  jshint = require('gulp-jshint'),
  // template = require('gulp-template'),
  swig = require('gulp-swig'),
  fs = require('fs'),
  livereloadport = 35729,
  serverport = 5000,
  paths = {
    src: {
      views: 'app/assets/views/*.blade.php',
      sass_vendor: ['app/assets/sass/bootstrap.scss'],
      sass_bundle: ['app/assets/sass/**/*.scss', '!src/sass/bootstrap.scss', '!src/sass/pages/*.scss'],
      sass_pages: [
        'app/assets/sass/pages/*.scss'
      ],
      vendor: ['app/assets/vendor/**/*'], // non bower supported vendor scripts
      js: 'app/assets/js/*.js',
      images: ['app/assets/images/**/*']
    },
    build: {
      views: 'app/views/site',
      css: 'public/css',
      js: 'public/js',
      bower: 'public/lib',
      vendor: 'public/lib/vendor',
      images: 'public/images'
    },
    watch: {
      sass: ['app/assets/sass/**/*.scss']
    }
  }
  // We only configure the server here and start it only when running the watch task
  //server = express();

// Remind me the port
//console.log("Server runnning on http://localhost:" + serverport)

// Add livereload middleware before static-middleware
//server.use(livereload({ port: livereloadport }));
//server.use(express.static(paths.build.views));

console.log("starting tasks");

// Task for sass using libsass through gulp-sass
gulp.task('sass-vendor', function() {
  gulp.src(paths.src.sass_vendor)
  .pipe(sass({sourceComments:'map'}))
  .pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 9"))
  .pipe(concat('bundle.vendor.css'))
  .pipe(minifyCSS())
  .pipe(gulp.dest(paths.build.css))
  .pipe(refresh(lrserver));
});

// Task for sass using libsass through gulp-sass
gulp.task('sass-site', function() {
  gulp.src(paths.src.sass_bundle)
  .pipe(sass({sourceComments:'map'}))
  .pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 9"))
  .pipe(concat('bundle.site.css'))
  .pipe(minifyCSS())
  .pipe(gulp.dest(paths.build.css))
  .pipe(refresh(lrserver));
});

// Task for sass using libsass through gulp-sass
gulp.task('sass-pages', function() {
  gulp.src(paths.src.sass_pages)
  .pipe(sass({sourceComments:'map'}))
  .pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 9"))
  .pipe(minifyCSS())
  .pipe(gulp.dest(paths.build.css + '/pages'))
  .pipe(refresh(lrserver));
});

gulp.task('sass', ['sass-vendor', 'sass-site', 'sass-pages']);

// non bower supported vendor scripts
gulp.task('vendor', function() {
  gulp.src(paths.src.vendor)
    .pipe(gulp.dest(paths.build.vendor));
});

// lint js
gulp.task('lint', function() {
  gulp.src(paths.src.js)
  .pipe(jshint())
  .pipe(jshint.reporter('default'));
});

//Task for processing js with browserify
gulp.task('browserify', function() {
  gulp.src(paths.src.js)
  // .pipe(browserify())
  .pipe(concat('bundle.js'))
  .pipe(gulp.dest(paths.build.js))
  .pipe(refresh(lrserver));
});

// Install bower dependencies into lib
gulp.task('bower', function() {
  bower()
  .pipe(gulp.dest(paths.build.bower));
});

// Image optimisation/minification
gulp.task('images', function () {
  gulp.src(paths.src.images)
  .pipe(imagemin())
  .pipe(gulp.dest(paths.build.images));
});

// Convenience task for running a one-off build
gulp.task('build', ['browserify', 'sass', 'images', 'bower', 'vendor']);

// Setup listeners for both servers (express/livereload)
//gulp.task('serve', function() {
  // Set up your static fileserver, which serves files in the build dir
//  server.listen(serverport);
  // Set up your livereload server
//  lrserver.listen(livereloadport);
//});

gulp.task('watch', function() {
  // Add watching on sass-files
  gulp.watch(paths.watch.sass, ['sass']);
  // Add watching on js-files
  gulp.watch(paths.src.js, ['lint', 'browserify']);
  // Add watching on js-files
  gulp.watch(paths.src.images, ['images']);
  // Add watching on html-files
  gulp.watch(paths.src.views, ['html']);
});

//gulp.task('default', ['build', 'serve', 'watch']);
gulp.task('default', ['build', 'watch']);
