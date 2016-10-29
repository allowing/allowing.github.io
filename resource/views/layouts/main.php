<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/13
 * Time: 14:53
 */
/** @var string $content */

use allowing\yunliwang\model\Cat;
use allowing\yunliwang\assets\AppAsset;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">

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
    <title><?= Html::encode($this->title) ?> - 允梨教育</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container">
    <header class="cf">
        <a href="<?= Url::to(['site/index']) ?>"><img class="logo" src="/images/logo.png" alt="logo"></a>
        <nav class="nav">
            <ul class="nav-box cf">
                <?php /** @var \allowing\yunliwang\model\Cat $nav */ ?>
                <?php foreach (Cat::findNavModel() as $nav): ?>
                    <?php if ($nav->type == Cat::TYPE_PAGE): ?>
                        <li class="nav-item"><a href="<?= Url::to(['cat/view', 'id' => $nav->id]) ?>"><?= $nav->name ?></a></li>
                    <?php elseif ($nav->type == Cat::TYPE_LINK): ?>
                        <li class="nav-item"><a href="<?= Url::to($nav->content) ?>"><?= $nav->name ?></a></li>
                    <?php elseif ($nav->type == Cat::TYPE_ARTICLE): ?>
                        <li class="nav-item"><a href="<?= Url::to(['article/index', 'ArticleSearch[cat_id]' => $nav->id]) ?>"><?= $nav->name ?></a></li>
                    <?php endif ?>
                <?php endforeach ?>
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
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>