// Mustache code browser.
var pd = parent.document;
var codeFill = pd.getElementById('sg-code-fill');
var codeTitle = pd.getElementById('sg-code-title-mustache');
if (codeFill) {
  // Give the PL Mustache code viewer the appearance of being linked.
  codeFill.addEventListener('mouseover', function () {
    if (codeTitle.className.indexOf('sg-code-title-active') > -1) {
      this.style.cursor = 'pointer';
    }
    else {
      this.style.cursor = 'default';
    }
  });
  // Send to Fepper's Mustache browser when clicking the viewer's Mustache code.
  codeFill.addEventListener('click', function () {
    if (codeTitle.className.indexOf('sg-code-title-active') > -1) {
      var code = encodeURIComponent(this.innerHTML);
      // HTML entities where necessary.
      code = code.replace(/><</g, '>&lt;<');
      code = code.replace(/><\/</g, '>&lt;/<');
      code = code.replace(/><!--/g, '>&lt;!--');
      var title = pd.getElementById('title').innerHTML.replace('Pattern Lab - ', '');
      window.location = window.location.origin + '/mustache-browser/?title=' + title + '&code=' + code;
    }
  });
}

// Redirect away from all-patterns page on launch.
if (window.location.pathname.indexOf('/styleguide/html/styleguide.html') > -1 && window.location.search === '') {
  window.location = '../../patterns/04-pages-00-homepage/04-pages-00-homepage.html';
}

// LiveReload.
if (window.location.port === '3000') {
  //<![CDATA[
    document.write('<script type="text/javascript" src="http://HOST:35729/livereload.js"><\/script>'.replace('HOST', location.hostname));
  //]]>
}
