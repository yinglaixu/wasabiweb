/* globals require */
var gulp = require('gulp'),
    minifyCSS = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    esLint = require('gulp-eslint'),
    plumber = require('gulp-plumber'),
    babel = require('gulp-babel'),
    autoprefixer = require('gulp-autoprefixer'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    sourcemaps = require('gulp-sourcemaps'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    notify = require('gulp-notify'),
    svgstore = require('gulp-svgstore'),
    svgmin = require('gulp-svgmin'),
    path = require('path'),
    filesize = require('gulp-filesize'),
    newer = require('gulp-newer'),
    livereload = require('gulp-livereload'),
    cssDest = 'build/css',
    imgDest = 'build/img',
    fontsDest = 'build/fonts',
    jsDest = {
        global: 'build/js',
        polyfills: 'build/js/polyfills'
    };


gulp.task('style', function() {
    return gulp.src('scss/style.scss', { noCache: true, style: 'compressed' })
        .pipe(newer(cssDest))
        .pipe(sourcemaps.init())
            .pipe(sass().on('error', sass.logError))
            .pipe(autoprefixer({
                browsers: ['last 4 versions'],
                cascade: false
            }))
            .pipe(minifyCSS({'advanced': false}))
            .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(cssDest))
        .pipe(livereload());
});


gulp.task('mainScript', function() {
    return gulp.src(['js/start.js', 'js/plugins/*.js', 'js/components/*.js', 'js/main.js'])
        .pipe(plumber())
        .pipe(newer(jsDest.global))
        .pipe(sourcemaps.init())
            .pipe(esLint())
            .pipe(esLint.format())
            .pipe(babel({
                ignore: [
                    'js/plugins/*.js'
                ]
            }))
            .pipe(concat('main.js'))
            .pipe(uglify())
            .pipe(filesize())
            .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(jsDest.global))
        .pipe(livereload());
});

gulp.task('polyfills', function() {
    return gulp.src('js/polyfills/*.js')
        .pipe(plumber())
        .pipe(newer(jsDest.polyfills))
        .pipe(sourcemaps.init())
            .pipe(babel())
            .pipe(uglify())
            .pipe(filesize())
            .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(jsDest.polyfills))
        .pipe(livereload());
});


gulp.task('php', function() {
    return gulp.src('*.php')
        .pipe(livereload());
});

gulp.task('fonts', function() {
    return gulp.src('fonts/**/*')
        .pipe(gulp.dest(fontsDest))
        .pipe(livereload());
});

gulp.task('image', function() {
    gulp.src(['img/media/**/*', 'img/wasabiweb.svg'])
        .pipe(newer(imgDest))
        .pipe(imagemin({ 
            optimizationLevel: 3, 
            progressive: true, 
            interlaced: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()] 
        }))
        .pipe(gulp.dest(imgDest))
        .pipe(notify({ message: 'Images task complete' }));
    gulp.src('img/svg-sprite-partials/*.svg')
        .pipe(newer(imgDest))
        .pipe(svgmin(function (file) {
            var prefix = path.basename(file.relative, path.extname(file.relative));
            return {
                plugins: [{
                    cleanupIDs: {
                        prefix: prefix + '-',
                        minify: true
                    }
                }]
            };
        }))
        .pipe(svgstore())
        .pipe(rename('sprite.svg'))
        .pipe(gulp.dest(imgDest))
        .pipe(livereload());
    return gulp;
});


// gulp.task('default', ['mainScript', 'polyfills', 'style', 'image', 'fonts'], function() {
//     livereload.listen();
//     gulp.watch('scss/**/*.scss', ['style']);
//     gulp.watch(['js/components/*.js', 'js/start.js', 'js/main.js', 'js/plugins/*.js'], ['mainScript']);
//     gulp.watch('js/polyfills/*.js', ['polyfills']);
//     gulp.watch(['**/*.php'], ['php']);
//     gulp.watch('img/**/*', ['image']);
//     gulp.watch('fonts/*', ['fonts']);
// });

gulp.task('default', function() {
    livereload.listen();
    gulp.watch('scss/**/*.scss', ['style']);
});