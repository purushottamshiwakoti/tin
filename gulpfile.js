var gulp = require('gulp'),
    sass = require('gulp-sass'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    merge = require('merge-stream'),
    // minifyCSS = require('gulp-minify-css');
    uglify = require('gulp-uglify'),
    uglifyes = require('gulp-uglify-es').default;
    minify = require('gulp-minify');
    cleanCSS = require('gulp-clean-css'),
    util = require('gulp-util'),
    notify = require("gulp-notify");
//
// var config = {
//     assetsDir: './public/website/',
//     sassPattern: 'sass/**/*.scss',
//     production: !!util.env.production
// };

gulp.task('build-css', function () {
    console.log("build-css");
    // var scssStream = gulp.src('./assets/scss/style.scss')
    //     .pipe(sass())
    //     .pipe(concat('scss-files.scss'));

    return gulp.src([
        // './public/website/css/yamm.css',
        './public/website/css/style.css',
        './public/website/css/spritestyle.css',
    ]).pipe(cleanCSS())
        // .pipe(concat('vendor.css'));

    // return merge(cssStream, scssStream)
    //     .pipe(concat('all.css'))
    //     .pipe(config.production ? cleanCSS() : util.noop())
        .pipe(rename({basename: 'main', suffix: '.min'}))
        .pipe(gulp.dest('./public/website/css/'))
        .pipe(notify("Finished Preparing CSS"));
});

gulp.task('build-js', function () {

    return gulp.src([
        './public/website/js/bootstrap-slider.js',
        // './public/website/js/parallax.min.js',
        './public/website/js/style.js',
        // './public/website/js/locations.js',
    ])
        // .pipe(concat('all.js'))
        .pipe(uglifyes())
        // .pipe(config.production ? uglify() : util.noop())
        .pipe(rename({basename: 'main', suffix: '.min'}))
        .on('error', function (err) { gutil.log(gutil.colors.red('[Error]'), err.toString()); })
        .pipe(gulp.dest('./public/website/js/'))
        .pipe(notify("Finished Preparing JS"));
});

gulp.task('minify-location-js', function () {

    return gulp.src([
        './public/website/js/locations.js',
    ])
    // .pipe(concat('all.js'))
        .pipe(uglifyes())
        // .pipe(config.production ? uglify() : util.noop())
        .pipe(rename({basename: 'locations', suffix: '.min'}))
        .on('error', function (err) { gutil.log(gutil.colors.red('[Error]'), err.toString()); })
        .pipe(gulp.dest('./public/website/js/'))
        .pipe(notify("Finished Preparing Locations JS"));
});

// gulp.task('watch', function () {
//     gulp.watch('./assets/scss/style.scss', ['build-css']);
//     gulp.watch('./assets/js/custom.js', ['build-js']);
// });

gulp.task('default', ['build-css', 'build-js','minify-location-js']);