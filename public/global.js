(function ($, undefined) {

try {
    setUpCountCode();
} catch (e) {
    throw e;
}


function setUpCountCode()
{
    window._hmt = window._hmt || [];
    $('head')
    .first()
    .prepend(
        '<script src="//hm.baidu.com/hm.js?1d85c535ce54f54b9c38f1d2ad49a516"></script>'
    );
}

})(jQuery);
