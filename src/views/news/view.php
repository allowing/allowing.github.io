<?php
/** @var \yii\web\View $this */
/** @var \allowing\yunliwang\model\MarkdownArticle $news */
$this->title = $news->title;
?>
<p class="tool-bar"><a href="javascript:history.back()">&lt;&lt;后退</a></p>
<div class="item">
    <div class="item-content"></div>
</div>
<script>
    (function () {
        $('.item-content').html(
            Allowing.markdown.markdown2html('<?= addcslashes($news->content, "',\r\n") ?>')
        );
    })();
</script>