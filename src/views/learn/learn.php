<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/13
 * Time: 17:53
 */
/** @var \yii\web\View $this */
/** @var \allowing\yunliwang\model\MarkdownArticle $learn */
$this->title = $learn->title;
?>
<p class="tool-bar"><a href="javascript:history.back()">&lt;&lt;后退</a></p>
<div class="item">
    <div class="item-content"></div>
</div>
<script>
    (function () {
        function markdown2html(markdown)
        {
            var converter = new showdown.Converter();
            return converter.makeHtml(markdown);
        }
        function loadedHighlight()
        {
            $('pre code').each(function(i, block) {
                hljs.highlightBlock(block);
            });
        }
        $('.item-content').html(markdown2html('<?= addcslashes($learn->content, "',\r\n") ?>'));
        loadedHighlight();
    })();
</script>