/**
 * Created by 84770 on 2016/10/29.
 */

define(['jquery', 'highlight', 'showdown'], function ($, hljs, showdown) {
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
        document.querySelector('body').appendChild(bp);
    };

    Allowing.Helper.setupBaiduCount = function () {
        window._hmt = window._hmt || [];

        var hm = document.createElement('script');
        hm.src = '//hm.baidu.com/hm.js?dfc5e1a2d5bc2d464b6a04dcb30881ea';
        document.querySelector('body').appendChild(hm);
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

    return Allowing;
});