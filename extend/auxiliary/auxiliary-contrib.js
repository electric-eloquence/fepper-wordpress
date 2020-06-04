/**
 * Separating auxiliary contrib tasks into this file to reduce the amount of
 * noise in contrib.js. The primary contrib tasks in contrib.js are preprocess
 * tasks. This means the they will run BEFORE the core Fepper task. The tasks
 * here are postprocess tasks. This means that they will run AFTER.
 */
'use strict';

const gulp = global.gulp;

gulp.task('contrib:data:postprocess', [
]);

gulp.task('contrib:frontend-copy:postprocess', [
]);

gulp.task('contrib:once:postprocess', [
]);

gulp.task('contrib:static:postprocess', [
]);

gulp.task('contrib:syncback:postprocess', [
]);

gulp.task('contrib:tcp-ip:postprocess', [
]);

gulp.task('contrib:template:postprocess', [
]);

// No postprocessing of watch tasks.
