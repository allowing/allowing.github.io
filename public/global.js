(function ($, hljs, window, undefined) {

function Allowing() {}
Allowing.markdown = {
    markdown2html: function (markdown) {
        var converter = new showdown.Converter();
        return converter.makeHtml(markdown);
    },
    loadedHighlight: function () {
        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block);
        });
    },
    hljsNumberLine: function () {
        $('pre code').each(function () {
            var lines = $(this).text().split('\n').length - 1;
            var $numbering = $('<ul/>').addClass('pre-numbering');
            $(this)
                .addClass('has-numbering')
                .parent()
                .append($numbering);
            for (i=1; i<=lines; i++) {
                $numbering.append($('<li/>').text(i));
            }
        });
    },
};
window.Allowing = Allowing;

try {
    $(function () {
        try {
            Allowing.markdown.loadedHighlight();
            Allowing.markdown.hljsNumberLine();
        } catch (e) {
            throw e;
        }
    });
} catch (e) {
    throw e;
}

})(jQuery, hljs, window);


