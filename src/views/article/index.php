<?php
/** @var \yii\web\View $this */
/** @var string $title */
/** @var string $category */

use yii\helpers\Url;

$this->title = $title;

?>

<ul class="list-box">
    <?php foreach ($models as $model): ?>
    <li class="list-item"><p class="list-item-info">[阅读：<?= $model->readCount ?>]</p><a href="<?= Url::to(['article/view', 'category' => $category, 'id' => $model->id]) ?>"><?= $model->title ?></a></li>
    <?php endforeach ?>
</ul>
