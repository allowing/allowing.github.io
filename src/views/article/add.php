<?php
/** @var \yii\web\View $this */

use yii\helpers\Url;

$this->title = '添加文章';
?>
<form action="<?= Url::to(['article/add']) ?>" method="post">
    <textarea name="article" id="article" cols="30" rows="10"></textarea>
    <input type="submit">
</form>


<script src="<?= Url::to('@web/codemirror-5.19.0/mode/markdown/markdown.js') ?>"></script>
<script>
(function () {
    var textArea = document.querySelector('#article');
    var codeMirrorEditor = CodeMirror.fromTextArea(textArea, {
        lineNumbers: true,
        theme: 'monokai',
        keyMap: 'sublime',
    });
})();
</script>