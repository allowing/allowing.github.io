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

$app = new \yii\web\Application(\yii\helpers\ArrayHelper::merge([
    'id' => 'yunliwang',
    'language' => 'zh-CN',
    'basePath' => __DIR__ . '/../src',
    'vendorPath' => __DIR__ . '/../vendor',
    'controllerNamespace' => 'allowing\yunliwang\controller',
    'modules' => [
        'admin' => [
            'class' => 'allowing\yunliwang\admin\Module',
            'layout' => 'main',
        ],
    ],
    'components' => [
        /** @var \yii\web\UrlManager */
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            // 'suffix' => '.html', // PHP内置的服务器不支持
            'rules' => [
                '' => 'site/index',
                'course' => 'site/course',
                'outline' => 'site/outline',
                'case' => 'site/case',
                'learn' => 'learn/index',
                'learn/<title>' => 'learn/learn',
                'news' => 'news/index',
                'news/<id>' => 'news/view',

                'admin/model/delete/<name>' => 'admin/model/delete',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'bootstrap' => ['log'],
], require __DIR__ . '/../src/config/main-local.php'));

$app->run();
