<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/13
 * Time: 1:30
 */

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../bootstrap.php';

$config = \yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../config.php',
    require __DIR__ . '/../config-local.php'
);

$app = new \yii\web\Application($config);

$app->run();
