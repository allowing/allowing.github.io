<?php
/** @var \yii\web\View $this */

use allowing\yiijsblock\YiiJsBlockWidget;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = '添加文章';
?>

<?php if ($model->hasErrors()): ?>
<pre>
<?php print_r($model->getFirstErrors()) ?>
</pre>
<?php endif ?>
<?php ActiveForm::begin() ?>
    <textarea name="Article[content]" id="article"><?= $model->content ?></textarea>
    <input type="submit">
<?php ActiveForm::end() ?>
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
