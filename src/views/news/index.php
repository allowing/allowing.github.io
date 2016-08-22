<?php
/** @var \yii\web\View $this */

use yii\helpers\Url;

$this->title = '公司动态';

?>

<ul class="list-box">
    <?php foreach ($newses as $news): ?>
    <li class="list-item"><a href="<?= Url::to(['news/view', 'id' => $news->id]) ?>"><?= $news->title ?></a></li>
    <?php endforeach ?>
</ul>
