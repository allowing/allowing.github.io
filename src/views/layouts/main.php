<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/13
 * Time: 14:53
 */
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

/** @var string $content */
?><!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <title><?= $this->title ?> - 允梨教育</title>
    <meta name="viewport" content="
        width=device-width,
        user-scalable=no,
        initial-scale=1.0,
        maximum-scale=1.0,
        minimum-scale=1.0">

    <!-- UC 浏览器 -->
    <meta name="layoutmode" content="standard">
    <meta name="nightmode" content="disable">

    <!-- X5 内核，也就是 QQ 浏览器 -->
    <meta name="x5-fullscreen" content="true">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="<?=
        ArrayHelper::getValue($this->params, 'keywords', '自学PHP,自学JS,PHP教程,IT培训,HTML,JS,CSS,PHP')
    ?>">
    <meta name="description" content="<?=
        ArrayHelper::getValue($this->params, 'description', '允梨教育是一家学习IT技术的第三方培训平台，学习周期短，学习技能多，从这里出来的学生均有较高的职业素养和较高的薪资。')
    ?>">
    <meta name="author" content="allowing">
    <link rel="stylesheet" href="<?= Url::to('@web/global.css') ?>">
    <link rel="stylesheet" href="<?= Url::to('@web/default.css') ?>">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.5.0/styles/monokai-sublime.min.css">
    <script src="//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="<?= Url::to('@web/showdown.min.js') ?>"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.5.0/highlight.min.js"></script>
    <script src="<?= Url::to('@web/jquery.SuperSlide.2.1.1.js') ?>"></script>
    <script src="<?= Url::to('@web/global.js') ?>"></script>
</head>
<body>
<div class="container">
    <header class="cf">
        <a href="<?= Url::to(['site/index']) ?>"><img class="logo" src="/images/logo.png" alt="logo"></a>
        <nav class="nav">
            <ul class="nav-box cf">
                <li class="nav-item"><a href="<?= Url::to(['site/index']) ?>">首页</a></li>
                <li class="nav-item"><a href="<?= Url::to(['article/index', 'category' => 'learn']) ?>">免费教程</a></li>
                <li class="nav-item"><a href="<?= Url::to(['article/index', 'category' => 'news']) ?>">公司动态</a></li>
                <li class="nav-item"><a href="<?= Url::to(['site/course']) ?>">主要课程</a></li>
                <li class="nav-item"><a href="<?= Url::to(['site/outline']) ?>">教学大纲</a></li>
                <li class="nav-item"><a href="<?= Url::to(['site/source']) ?>">学习资源</a></li>
                <li class="nav-item"><a href="<?= Url::to(['article/index', 'category' => 'experience']) ?>">杂谈</a></li>
                <li class="nav-item"><a href="<?= Url::to(['site/case']) ?>">成功案例</a></li>
                <li class="nav-item"><a href="<?= Url::to('http://wpa.qq.com/msgrd?v=3&uin=1076707907&site=qq&menu=yes') ?>" target="_blank">QQ联系</a></li>
            </ul>
        </nav>
    </header>
    <?= $content ?>
    <footer>
        <div class="give-me-money">
            <h3 class="give-me-money-title">捐赠我们</h3>
            <div class="give-me-money-item">
                <h4 class="give-me-money-type">微信</h4>
                <img src="<?= Url::to('@web/images/weixin-code.png') ?>" alt="微信二维码">
            </div>
            <div class="give-me-money-item">
                <h4 class="give-me-money-type">支付宝</h4>
                <img src="<?= Url::to('@web/images/zhifubao-code.png') ?>" alt="支付宝二维码">
            </div>
        </div>
        <p class="footer-p">友情链接：<a href="http://linxue.net/" target="_blank">林雪博客</a>|<a href="http://yuerblog.cc/" target="_blank">鱼儿的博客</a>|<a href="http://www.yoyo88.cn/" target="_blank">yoyo博客</a>|<a href="http://www.phpin.net/" target="_blank">PHPIN</a>|<a href="http://www.copyf.com/" target="_blank">网站技术资源整合网</a></p>
        <p class="footer-p">关于内容：本站内容均为站长原创，未经允许不得转载。个别语言的组织会摘自互联网，如果侵权，可联系删除</p>
        <p class="footer-p"><a href="/sitemap.html">网站地图</a></p>
    </footer>
</div>
</body>
</html>