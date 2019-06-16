const gulp = require('gulp');
var rename = require('gulp-rename');
const uglify = require('gulp-uglify');
 
var sourcemaps = require('gulp-sourcemaps');
var browserify = require('browserify');
var babelify = require('babelify');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');

var jsFOLDER = 'x_moikzz_assets/back/js/modules/';
var jsSRC = 'app.js';
var jsDIST = 'x_moikzz_assets/back/dist/js'; 
var jsWatch = 'x_moikzz_assets/back/js/**/*.js';
var jsFILES = [jsSRC];

function js(done){
 
    jsFILES.map(function(entry){
        return browserify({
            entries: [jsFOLDER + entry]
        })
        .transform( babelify, { presets: ['env']} )
        .bundle()
        .pipe( source( entry ))
        .pipe( rename({ suffix: '.min' }) )
        .pipe( buffer() )
        .pipe( sourcemaps.init({ loadMaps: true }) )
        .pipe( uglify() )
        .pipe( sourcemaps.write( './' ) )
        .pipe( gulp.dest( jsDIST ))
    });
    done();
}

function watch_files(){ 
    gulp.watch(jsWatch, js);
    gulp.src(jsFOLDER + 'app.js');
}

gulp.task("scripts", js); 
gulp.task("default",  gulp.parallel( 'scripts' ));
gulp.task("watch", watch_files);