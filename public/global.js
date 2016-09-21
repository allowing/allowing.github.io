(function ($, hljs, window, undefined) {

var Allowing = function () {};

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


