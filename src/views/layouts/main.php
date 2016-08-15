<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/13
 * Time: 14:53
 */
use yii\helpers\Url;

/** @var string $content */
?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="
        width=device-width,
        user-scalable=no,
        initial-scale=1.0,
        maximum-scale=1.0,
        minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->title ?> - 允梨教育</title>
    <meta name="keywords" content="PHP教程,IT,WEB,IT培训,HTML,JS,CSS,PHP">
    <meta name="description" content="允梨教育是一家学习IT技术的第三方培训平台，学习周期短，学习技能较多，从这里出来的学生均有较高的职业素养和较高的工资。想学习IT技术来允梨教育。">
    <link rel="stylesheet" href="<?= Url::to('@web/global.css') ?>">
    <link rel="stylesheet" href="<?= Url::to('@web/default.css') ?>">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.5.0/styles/monokai-sublime.min.css">
    <script src="//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="<?= Url::to('@web/showdown.min.js') ?>"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.5.0/highlight.min.js"></script>
    <script src="<?= Url::to('@web/global.js') ?>"></script>
</head>
<body>
<div class="container">
    <nav class="nav">
        <ul class="nav-box">
            <li class="nav-item"><a href="<?= Url::to(['site/index']) ?>">首页</a></li>
            <li class="nav-item"><a href="<?= Url::to(['site/course']) ?>">主要课程</a></li>
            <li class="nav-item"><a href="<?= Url::to(['site/outline']) ?>">课程大纲</a></li>
            <li class="nav-item"><a href="<?= Url::to(['learn/index']) ?>">免费教程</a></li>
            <li class="nav-item"><a href="<?= Url::to(['site/case']) ?>">成功案例</a></li>
        </ul>
    </nav>
    <?= $content ?>
    <footer>
        <p class="footer-p">关于内容：本站内容均为站长原创，未经允许不得转载</p>
    </footer>
</div>
</body>
</html>
