'use strict';
const
    {src, dest, parallel, series} = require('gulp'),
    fs = require('fs'),
    gulp = require('gulp'),
    browserReload = require('browser-sync'),
    autoprefixer = require('gulp-autoprefixer'),
    sass = require('gulp-sass'),
    sourcemap = require('gulp-sourcemaps'),
    nano = require('gulp-clean-css'),
    plumber = require('gulp-plumber'),
    debug = require('gulp-debug'),
    watch = require('gulp-watch')
;

const
    path = {
        js: './**/*.js',
        sass: './sass/**/*.*',
        css: './',
        php: './**/*.php'
    }

function browserSync() {
    browserReload.init(
        {
            proxy: {
                target: 'https://dds.template/',
            },
            files: [path.php, path.js],
            port: 3002,
            https: {
                key: "../../../../../Server/userdata/config/cert_files/localhost/localhost-server.key",
                cert: "../../../../../Server/userdata/config/cert_files/localhost/localhost-server.crt",
            },
            notify: false
        }
    );
}

function theme__css() {
    return src(path.sass)
        .pipe(plumber(
            ({
                errorHandler: function (err) {
                    console.log(err.message);
                    this.emit('end');
                }
            })
        ))
        .pipe(debug({title: 'Compiles:'}))
        .pipe(sass({}).on('error', sass.logError))
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], {cascade: true}))
        .pipe(sourcemap.init())
        .pipe(nano())
        .pipe(sourcemap.write('.'))
        .pipe(dest(path.css))
}


function stream_theme() {
    watch(path.sass, parallel(theme__css,));
}


exports.browserReload = browserSync;
exports.theme__css = theme__css;
exports.stream_theme = stream_theme;
exports.defaults = parallel(stream_theme, browserSync);
