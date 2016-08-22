(function ($, hljs, window, undefined) {

function setUpCountCode()
{
    window._hmt = window._hmt || [];
    $('head')
    .first()
    .prepend(
        '<script src="//hm.baidu.com/hm.js?1d85c535ce54f54b9c38f1d2ad49a516"></script>'
    );
}

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
};
window.Allowing = Allowing;

try {
    setUpCountCode();
} catch (e) {
    throw e;
}

$(function () {
    try {
        Allowing.markdown.loadedHighlight();
    } catch (e) {
        throw e;
    }
});

})(jQuery, hljs, window);


