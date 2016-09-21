(function ($, hljs, window, undefined) {

var Allowing = function () {};

Allowing.Helper = function () {};

Allowing.Helper.setupBaiduSeoPush = function () {
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    } else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var head = document.querySelector('head');
    head.insertBefore(bp, head.firstChild);
};

Allowing.Markdown = function () {};

Allowing.Markdown.markdown2html = function (markdown) {
    var converter = new showdown.Converter();
    return converter.makeHtml(markdown);
};

Allowing.Markdown.loadedHighlight = function () {
    $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
    });
};

Allowing.Markdown.hljsNumberLine = function () {
    $('pre code').each(function () {
        var lines = $(this).text().split('\n').length - 1;
        var $numbering = $('<ul/>').addClass('pre-numbering');
        $(this)
            .addClass('has-numbering')
            .parent()
            .append($numbering);
        for (i = 1; i <= lines; i++) {
            $numbering.append($('<li/>').text(i));
        }
    });
};

window.Allowing = Allowing;

try {
    $(function () {
        try {
            Allowing.Helper.setupBaiduSeoPush();
            Allowing.Markdown.loadedHighlight();
            Allowing.Markdown.hljsNumberLine();
        } catch (e) {
            throw e;
        }
    });
} catch (e) {
    throw e;
}

})(jQuery, hljs, window);


