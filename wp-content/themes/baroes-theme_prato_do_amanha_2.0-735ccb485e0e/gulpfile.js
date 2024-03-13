'use strict'

import gulp from 'gulp';
import concat from 'gulp-concat';
import rename from 'gulp-rename';
import uglify from 'gulp-uglify';
import eslint from 'gulp-eslint';
import gulpSass from 'gulp-sass';
import imagemin from 'gulp-imagemin';
import dartSass from 'sass';
import cleanCss from 'gulp-clean-css';
import { deleteAsync } from 'del';

const { task, series, parallel, watch, src, dest } = gulp;
const sass = gulpSass(dartSass);

/** Limpar o diretorio de assets. */
async function clean() {
    await deleteAsync(['assets/**/*.*']);
}

/** Gera as imagens. */
function images() {
    return src('source/images/**/*')
        .pipe(imagemin())
        .pipe(dest('assets/images/'))
}

/** Gera o arquivo CSS. */
function css() {
    //return src(['node_modules/bootstrap/dist/css/bootstrap.min.css' ,  'source/scss/main.scss'])
    return src(['source/scss/main.scss'])
        .pipe(concat('frontend.css'))
        .pipe(sass({outputStyle: 'expanded'}))
        .pipe(rename({basename: 'frontend', suffix: '.min'}))
        .pipe(cleanCss())
        .pipe(dest('./assets/css/'));
}

/** Verifica a integridade do Javascript. */
function javascriptLint() {
    return src(['./source/scripts/*.js'])
        .pipe(eslint())
        .pipe(eslint.format())
        .pipe(eslint.failAfterError());
}

/** Gera o arquivo Javascript. */
function javascript() {
    //return src(['node_modules/bootstrap/dist/js/bootstrap.min.js', 'source/scripts/*.js'])
        return src(['source/scripts/*.js'])
        .pipe(concat('frontend.js'))
        .pipe(uglify())
        .pipe(rename({ suffix: '.min' }))
        .pipe(dest('assets/js/'));
}

/** Aguarda alterações nos arquivos e executa uma ação. */
function watchFiles() {
    watch('./source/images/**/*', images);
    watch('./source/scss/**/*', css);
    watch('./source/scripts/**/*', series(javascriptLint, javascript));
}

/** Tarefas iniciais. */
const build = series(clean, parallel(images, css, series(/*javascriptLint,*/ javascript)));
task('default', series(build, parallel(watchFiles)));