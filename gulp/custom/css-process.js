/**
 * Use any CSS pre- or post-processor you wish. Or use none.
 */
var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();

gulp.task('css-process', function () {
// Uncomment if you want to use Stylus.
//  return gulp.src('./' + conf.src + '/css-processors/stylus/*.styl')
//    .pipe(plugins.stylus({linenos: true}))
//    .pipe(gulp.dest('./' + conf.src + '/css'));
// Uncomment if you want to use SCSS. Replace if you want to use something else.
//  return gulp.src('./' + conf.src + '/css-processors/scss/*.scss')
//    .pipe(plugins.sass({outputStyle: 'expanded'}).on('error', plugins.sass.logError))
//    .pipe(gulp.dest('./' + conf.src + '/css'));
});
 
gulp.task('css-process:watch', function () {
// Uncomment if you want to use Stylus.
//  gulp.watch('./' + conf.src + '/css-processors/stylus/**/*.styl', ['css-process']);
// Uncomment if you want to use SCSS. Replace if you want to use something else.
//  gulp.watch('./' + conf.src + '/css-processors/scss/**/*.scss', ['css-process']);
});
