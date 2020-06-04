/**
 * Put tasks defined in ~extend.js appended files within the more general tasks listed below.
 */
'use strict';

const gulp = global.gulp;

gulp.task('contrib:data', [
]);

gulp.task('contrib:frontend-copy', [
  // Comment or delete if you wish to disable this.
  'stylus:frontend-copy'
]);

gulp.task('contrib:once', [
  // Comment or delete if you wish to disable this.
  'stylus:diff-then-comment'
  // If you are a power-user, delete 'stylus:diff-then-comment'. If you still want Stylus, uncomment 'stylus:once' for
  // better performance, or replace with 'stylus:no-comment' (also more performant) if you do not want line comments in
  // your CSS.
  // 'stylus:once'
]);

gulp.task('contrib:static', [
]);

gulp.task('contrib:syncback', [
]);

gulp.task('contrib:tcp-ip', [
]);

gulp.task('contrib:template', [
]);

gulp.task('contrib:watch', [
  // Comment or delete if you wish to disable this.
  'stylus:watch-write-tmp'
  // If you are a power-user, delete 'stylus:watch-write-tmp'. If you still want Stylus, uncomment 'stylus:watch' for
  // better performance, or replace with 'stylus:watch-no-comment' (also more performant) if you do not want line
  // comments in your CSS.
  // 'stylus:watch'
]);
