<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/13
 * Time: 17:36
 */
use yii\helpers\Url;

/** @var array $learns */
/** @var \allowing\yunliwang\model\MarkdownArticle $learn */
/** @var \yii\web\View $this */
$this->title = '免费教程';

?>

<ul class="list-box">
    <?php foreach ($learns as $learn): ?>
    <li class="list-item"><a href="<?= Url::to(['learn/learn', 'title' => $learn->id]) ?>"><?= $learn->title ?></a></li>
    <?php endforeach ?>
</ul>
