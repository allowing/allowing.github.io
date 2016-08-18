<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/13
 * Time: 1:30
 */

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'prod');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$app = new \yii\web\Application([
    'id' => 'yunliwang',
    'language' => 'zh-CN',
    'basePath' => __DIR__ . '/../src',
    'vendorPath' => __DIR__ . '/../vendor',
    'controllerNamespace' => 'allowing\yunliwang\controller',
    'components' => [
        /** @var \yii\web\UrlManager */
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            // 'suffix' => '.html', // PHP内置的服务器不支持
            'rules' => [
                'learn/index' => 'learn/index',
                'learn/<title>' => 'learn/learn',
            ],
        ],
        'db' => [
            /** @var \yii\db\Connection */
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=allowing',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],

    ],
    'bootstrap' => [

    ],
]);

$app->run();
