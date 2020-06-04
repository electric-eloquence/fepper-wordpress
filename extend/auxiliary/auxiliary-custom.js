/**
 * Separating auxiliary custom tasks into this file to reduce the amount of
 * noise in custom.js. The primary custom tasks in custom.js are preprocess
 * tasks. This means the they will run BEFORE the core Fepper task. The tasks
 * here are postprocess tasks. This means that they will run AFTER.
 */
'use strict';

const gulp = global.gulp;

gulp.task('custom:data:postprocess', [
]);

gulp.task('custom:frontend-copy:postprocess', [
  'tab-indent-compiled-stylus'
]);

gulp.task('custom:once:postprocess', [
]);

gulp.task('custom:static:postprocess', [
]);

gulp.task('custom:syncback:postprocess', [
]);

gulp.task('custom:tcp-ip:postprocess', [
]);

gulp.task('custom:template:postprocess', [
]);

// No postprocessing of watch tasks.
