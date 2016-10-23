<?php
/** @var \yii\web\View $this */
/** @var \allowing\yunliwang\model\ArticleCat|null $catModel */
/** @var \yii\data\DataProviderInterface $dataProvider */
/** @var \allowing\yunliwang\model\ArticleSearch $searchModel */

use yii\helpers\Url;

if ($catModel) {
    if ($catModel->seo_name) {
        $this->title = "{$catModel->seo_name} - {$catModel->name}";
    }
    if ($catModel->description) {
        $this->params['description'] = $catModel->description;
    }
} else {
    $this->title = "所有文章";
    $this->params['description'] = '这里提供优质的PHP、JAVA、JS、WEB前端、后台等文章，同时阅读体验优秀，是学习IT技术的良好平台。';
}
?>

<ul class="list-box">
    <?php foreach ($dataProvider->getModels() as $model): ?>
    <li class="list-item"><a href="<?= Url::to(['article/view', 'id' => $model->id]) ?>"><?= $model->title ?></a></li>
    <?php endforeach ?>
</ul>
