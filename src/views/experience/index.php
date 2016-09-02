<?php
/** @var \yii\web\View $this */

use yii\helpers\Url;

$this->title = '杂谈';

?>

<ul class="list-box">
    <?php foreach ($models as $model): ?>
    <li class="list-item"><a href="<?= Url::to(['experience/view', 'id' => $model->id]) ?>"><?= $model->title ?></a></li>
    <?php endforeach ?>
</ul>
