/**
 * Created by 84770 on 2016/10/29.
 */

require.config({
    baseUrl: '/',
    paths: {
        jquery: ['http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min', 'jquery.min'],
        highlight: ['highlight.min'],
        showdown: ['showdown.min'],
        'jquery.SuperSlide': 'jquery.SuperSlide.2.1.1',
    },
    shim: {
        'jquery.SuperSlide': ['jquery'],
    },
});

require(['jquery', 'Allowing'], function ($, Allowing) {
    try {
        Allowing.Helper.setupBaiduSeoPush();
        Allowing.Helper.setupBaiduCount();
        Allowing.Markdown.loadedHighlight();
        Allowing.Markdown.hljsNumberLine();
        Allowing.Markdown.markdown2html('123');
    } catch (e) {
        throw e;
    }
});
