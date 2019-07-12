const { src, dest, watch, series, parallel  } = require('gulp');
const clean = require('gulp-clean');
const rename = require('gulp-rename');
const  imagemin = require('gulp-imagemin');
const  imageminSvgo = require('imagemin-svgo');

// SVG function
function cleanSvg(){
    return src('svg-template/*.svg', {read : false})
        .pipe(clean()
        );
}

function svgTask(){
    return src('./svg-template/*.svg')
        .pipe(imagemin([
            imageminSvgo({
                plugins: [
                    {removeViewBox: false},
                    {prefixIds: 'am-'},
                    {cleanupIDs : true},
                ]
            })
        ]))
        .pipe(rename({
            prefix : 'svg-',
            extname : '.php'
        }))
        .pipe(dest('./svg-template')
        );
}

exports.svg = series(
    svgTask,
    cleanSvg
)

