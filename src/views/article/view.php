<?php
/** @var \yii\web\View $this */
/** @var \allowing\yunliwang\model\MarkdownArticle $model */
$this->title = $model->title;
?>
<p class="tool-bar"><a href="javascript:history.back()">&lt;&lt;后退</a></p>
<div class="item">
    <div class="item-content"></div>
</div>
<script>
    (function () {
        $('.item-content').html(
            Allowing.markdown.markdown2html('<?= addcslashes($model->content, "',\r\n") ?>')
        );
    })();

    (function () {
        var titles = $('.item-content').children('h2,h3,h4,h5,h6');
        if (!titles.size()) {
            return;
        }
        var foo = 's6d74fg6dg3f42g643g4sd4e';
        var wrapClass = 'content-toc-' + foo;
        var wrapBox = $('<div>').attr({
            css: wrapClass,
        });
        var hrefName = 'href-title-' + foo;
        titles.each(function (i, item) {
            $(item).attr('id', hrefName + i);
            var link = $('<a>').attr({
                href: '#' + hrefName + i,
            }).html($(this).html());
            var ml = 0;
            switch (item.localName) {
                case 'h3':
                    ml = 30;
                break;
                case 'h4':
                    ml = 60;
                break;
                case 'h5':
                    ml = 90;
                break;
                case 'h6':
                    ml = 120;
                break;
            }
            link.css('margin-left', ml);
            wrapBox.append(link).append($('<br>'));
        });
        wrapBox.css({
            backgroundColor: '#fff',
            position: 'fixed',
            padding: '40px 30px',
            top: 20,
            left: leftPosition(),
            fontSize: 12,
            lineHeight: 1.8,
        });
        wrapBox.appendTo('body');

        function leftPosition()
        {
            var con = $('.container').get(0);
            return con.offsetLeft + con.offsetWidth + 30;
        }
    })();
</script>