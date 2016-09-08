<?php
/** @var \yii\web\View $this */

use yii\helpers\Url;

$this->title = '模型列表';

?>
<p><a href="<?= Url::to(['add']) ?>">新增模型</a></p>
<table>
    <thead>
        <tr>
            <th>英文名称</th>
            <th>中文名称</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($models as $model): ?>
        <tr>
            <td><?= $model->name ?></td>
            <td><?= $model->name_zh ?></td>
            <td><a href="<?= Url::to(['delete', 'name' => $model->name]) ?>">删除</a>|<a href="">字段管理</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
