<?php

use yii\helpers\Url;

/** @var \yii\web\View $this */
$this->title = '首页';
?>
<ul>
    <li><a href="<?= Url::to(['model/index']) ?>">模型管理</a></li>
    <li><a href="<?= Url::to(['model-record/index']) ?>">内容管理</a></li>
</ul>

<pre>
模型表
    模型字段表
记录表
    记录扩展表
</pre>