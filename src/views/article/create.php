<?php
/** @var \yii\web\View $this */

use yii\helpers\Url;

$this->title = '添加文章';
?>
<?php if ($model->hasErrors()): ?>
<pre>
<?php print_r($model->getFirstErrors()) ?>
</pre>
<?php endif ?>
<form action="<?= Url::to(['article/create']) ?>" method="post">
    <textarea name="MarkdownArticle[iniMarkdown]" id="article"></textarea>
    <input type="submit">
</form>

<script src="<?= Url::to('@web/codemirror-5.19.0/mode/markdown/markdown.js') ?>"></script>
<script>
(function () {
    var textArea = document.querySelector('#article');
    var codeMirrorEditor = CodeMirror.fromTextArea(textArea, {
        lineWrapping: true,
        lineNumbers: true,
        theme: 'monokai',
        keyMap: 'sublime',
    });
})();
</script>