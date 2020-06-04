'use strict';

const gulp = global.gulp;
const replace = require('gulp-replace');
const utils = require('fepper-utils');

const conf = global.conf;
const pref = global.pref;

const backendStylesDirChild = utils.backendDirCheck(`${pref.backend.synced_dirs.styles_dir}/bld`);

let backendStylesDirParent = pref.backend.synced_dirs.styles_dir.replace('-child', '');
backendStylesDirParent = utils.backendDirCheck(`${backendStylesDirParent}/bld`);

gulp.task('tab-indent-compiled-stylus:parent', function (cb) {
  if (backendStylesDirParent) {
    return gulp.src(conf.ui.paths.public.cssBld + '/style.css')
      .pipe(replace(/ {2}/g, '\t'))
      .pipe(gulp.dest(backendStylesDirParent));
  }
  else {
    cb();
  }
});

gulp.task('tab-indent-compiled-stylus:child', function (cb) {
  if (backendStylesDirChild) {
    return gulp.src(conf.ui.paths.public.cssBld + '/style-child.css')
      .pipe(replace(/ {2}/g, '\t'))
      .pipe(gulp.dest(backendStylesDirChild));
  }
  else {
    cb();
  }
});

gulp.task('tab-indent-compiled-stylus', [
  'tab-indent-compiled-stylus:parent',
  'tab-indent-compiled-stylus:child'
]);
