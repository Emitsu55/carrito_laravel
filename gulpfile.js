const { src, dest, watch, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');
const cssnano = require('cssnano');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const cache = require('gulp-cache');

const paths = {
    scss: 'resources/scss/**/*.scss',
    css: 'public/assets/css',
    js: 'resources/js/mios/*.js'
}

function css() {
    return src(paths.scss)
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(postcss([autoprefixer()]))
        .pipe(sourcemaps.write('.'))
        .pipe( dest(paths.css) );
}

function javascript() {
    return src(paths.js)
        .pipe(concat('app.js'))
        .pipe(dest('public/assets/js'))
}

function watchFiles() {
    watch(paths.scss, css);
    watch(paths.js, javascript);
}

exports.default = parallel(css, javascript, watchFiles);