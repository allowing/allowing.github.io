<?php
/** @var \yii\web\View $this */

use yii\helpers\Url;

$this->title = '添加文章';
?>
<div>
    <form action="<?= Url::to(['article/add']) ?>">
        <textarea name="article" id="article" cols="30" rows="10"></textarea>
        <input type="submit">
    </form>
</div>