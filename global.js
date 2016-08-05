(function ($, undefined) {

try {
    setUpCountCode();
} catch (e) {
    throw e;
}


function setUpCountCode()
{
    $('head')
    .first()
    .prepend('<script src="//hm.baidu.com/hm.js?585a8253b132aa407f51c7b58e42d10c"></script>');
}

})(jQuery);
