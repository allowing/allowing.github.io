<?php
/** @var \yii\web\View $this */
/** @var \allowing\yunliwang\model\ArticleCat $catModel */

use yii\helpers\Url;

$this->title = $catModel->name;
$this->params['keywords'] = $catModel->keywords;
$this->params['description'] = $catModel->description;
?>

<ul class="list-box">
    <?php foreach ($models as $model): ?>
    <li class="list-item"><p class="list-item-info">更新：<?= date('Y-m-d', $model->updatedAt) ?>&nbsp;阅读：<?= $model->readCount ?></p><a href="<?= Url::to(['article/view', 'category' => $catModel->identity, 'id' => $model->id]) ?>"><?= $model->title ?></a></li>
    <?php endforeach ?>
</ul>
