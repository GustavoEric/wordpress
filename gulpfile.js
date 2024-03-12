const gulp = require ('gulp');
const sass = require('gulp-sass')(require('sass'));

// Utilizando Stylus
// const stylus = require ('gulp-stylus');

// gulp.task('stylus' ,function(){
//     gulp.src('./src/stylus/main.styl')
//         .pipe(stylus())
//         .pipe(gulp.dest('./dist/css'))
//     })

gulp.task('sass' ,function(){
    gulp.src('./src/scss/main.scss')
        .pipe(sass())
        .pipe(gulp.dest('./dist/css'))
    })