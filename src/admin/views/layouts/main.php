<?php
/** @var \yii\web\View */
/** @var string $content */

use yii\helpers\Html;

?><!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= Html::encode($this->title) ?></title>
</head>
<body>
<?= $content ?>
</body>
</html>