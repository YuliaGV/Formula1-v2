const { series, src, dest, watch} = require('gulp');
const sass = require('gulp-sass')(require('sass'))


function minificarcss(  ) {
    return src('src/scss/app.scss')
        .pipe( sass({
            outputStyle: 'compressed',
        }) )
        .pipe( dest('./build/css') )
}

//Compilar auto

function watchArchivos(){
    watch( 'src/scss/**/*.scss', minificarcss );
}

exports.minificarcss = minificarcss;
exports.watchArchivos = watchArchivos;