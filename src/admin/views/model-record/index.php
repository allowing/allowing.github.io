<?php

/** @var \yii\web\View $this */

$this->title = '模型记录';


?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>模型</th>
            <th>主题</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($models as $model): ?>
        <tr>
            <td><?= $model->id ?></td>
            <td><?= $model->model_name ?></td>
            <td><?= $model->subject ?></td>
            <td><a href="">修改</a>|<a href="">删除</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>