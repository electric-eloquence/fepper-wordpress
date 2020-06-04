/**
 * This is an example custom task which copies Stylus files to the public directory.
 * There probably isn't any use-case for exposing CSS preprocessing to end-users, so you are encouraged to rename,
 * overwrite, or delete this demonstration.
 */
'use strict';

const gulp = global.gulp;
// Commonly used utility functions.
const utils = require('fepper-utils'); // https://www.npmjs.com/package/fepper-utils

const conf = global.conf;    // Read from conf.yml
// const pref = global.pref; // Read from pref.yml

gulp.task('expose-stylus', function () {
  // conf.ui values are read from patternlab-config.json. Relative paths are converted to absolute paths.
  // Use conf.ui.pathsRelative if you need relative paths.
  return gulp.src(conf.ui.paths.source.cssSrc + '/stylus/**/*')
    .pipe(gulp.dest(conf.ui.paths.public.css));
});

gulp.task('example:help', function (cb) {
  let out = `
Fepper Example Extension

Use:
    <task> [<additional args>...]

Tasks:
    fp example:help     Appears if no other extension prints help text.
                        Be sure not to name any real task "fp example:help".
`;

  utils.info(out);
  cb();
});
