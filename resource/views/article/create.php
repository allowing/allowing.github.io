<?php
/** @var \yii\web\View $this */

use allowing\yiijsblock\YiiJsBlockWidget;
use yii\helpers\Url;

$this->title = '添加文章';
?>

<?php if ($model->hasErrors()): ?>
<pre>
<?php print_r($model->getFirstErrors()) ?>
</pre>
<?php endif ?>

<form action="<?= Url::to(['article/create']) ?>" method="post">
    <textarea name="Article[iniMdContent]" id="article"><?= $model->iniMdContent ?></textarea>
    <input type="submit">
</form>

<?php YiiJsBlockWidget::begin() ?>
<script>
require([
    'codemirror-5.19.0/lib/codemirror',
    'codemirror-5.19.0/keymap/sublime',
    'codemirror-5.19.0/mode/markdown/markdown',
], function (CodeMirror) {
    var textArea = document.querySelector('#article');
    var codeMirrorEditor = CodeMirror.fromTextArea(textArea, {
        lineWrapping: true,
        lineNumbers: true,
        theme: 'monokai',
        keyMap: 'sublime',
        mode: 'markdown',
    });
});
</script>
<?php YiiJsBlockWidget::end() ?>
