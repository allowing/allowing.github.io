<?php
/**
 * Created by PhpStorm.
 * User: 84770
 * Date: 2016/10/23
 * Time: 18:33
 */
/**
 * @var \allowing\yunliwang\model\ArticleCat $model
 * @var \yii\web\View $this
 */

if ($model->seo_name) {
    $this->title = "{$model->name} - {$model->seo_name}";
} else {
    $this->title = $model->name;
}

if ($model->description) {
    $this->params['description'] = $model->description;
}
?>
<?= $model->content ?>
