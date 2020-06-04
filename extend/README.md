# Extensions

Fepper comes preconfigured with the 
<a href="https://www.npmjs.com/package/fp-stylus" target="_blank">fp-stylus</a> 
CSS preprocessing extension. You are by no means required to keep it. You may 
remove it with `npm rm --save-dev fp-stylus`. Then, delete the `extend/stylus` tasks 
from `extend/contrib.js`.

### Contributed extensions

* Install and update contributed extensions with npm.
* Add the tasks to `extend/contrib.js` (and `extend/auxiliary/auxiliary_contrib.js`
  if necessary) in order for Fepper to run them.
* Contributed Fepper extensions can be found at 
  <a href="https://www.npmjs.com/search?q=fepper%20extension" target="_blank">
  https://www.npmjs.com/search?q=fepper%20extension</a>

### Custom extensions

* Write custom extensions in the `extend/custom` directory.
* Extensions require a file ending in "~extend.js" in order for Fepper to 
  recognize their gulp tasks.
* The "\*~extend.js" file can be directly under `extend/custom`, or nested one 
  directory deep, but no deeper.
* Add the tasks to `extend/custom.js` (and `extend/auxiliary/auxiliary_custom.js`
  if necessary) in order for Fepper to run them.
* Fepper runs a self-contained instance of gulp to manage tasks. This gulp 
  instance will be independent of any other gulp instance on your system.
* The `fp` command is an alias for `gulp` (among other things). Any `fp` task 
  can be included in a custom task.
* Fepper only supports 
  <a href="https://github.com/electric-eloquence/gulp#readme" target="_blank">gulp 3</a> 
  syntax.

### Confs and prefs

You might need to access the values in the `conf.yml` and `pref.yml` files in 
order to write custom tasks. They are exposed through `global.conf` and 
`global.pref` (on the `global` Node object).

The values in `patternlab-config.json` are exposed through `global.conf.ui`. 
Please note that all paths in `patternlab-config.json` will be converted to 
absolute paths in `global.conf.ui`.

### Fepper Utils

Common utilty functions for custom extensions are available from the 
<a href="https://www.npmjs.com/package/fepper-utils" target="_blank">Fepper Utils</a> 
npm. Its API documentation can be viewed by following the link.

### CSS Preprocessor Line Comments

Fepper's CSS preprocessing extensions default toward the printing of line 
comments for debugging purposes. Doing so provides an unambiguous indication 
that the CSS was preprocessed and that direct edits to the CSS should be 
avoided. If a project decision is made to style with one of them, it would be a 
good idea to have version control ignore CSS builds in the `source` directory. 
This would avoid committing line comments, which could otherwise lead to a 
morass of conflicts.
