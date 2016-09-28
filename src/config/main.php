<?php

return [
    'id' => 'yunliwang',
    'language' => 'zh-CN',
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(__DIR__) . '/vendor',
    'controllerNamespace' => 'allowing\yunliwang\controller',
    'components' => [
        /** @var \yii\web\UrlManager */
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            // 'suffix' => '.html', // PHP内置的服务器不支持
            'rules' => [
                'GET ' => 'site/index',
                'GET <action>' => 'site/<action>',
                'GET article/<category>' => 'article/index',
                'GET article/<category>/<id>' => 'article/view',
            ],
        ],
        'cache' => [
            /** @var \yii\caching\FileCache */
            'class' => 'yii\caching\FileCache',
        ],
        'readCount' => [
            /** @var \allowing\yunliwang\component\ReadCount */
            'class' => 'allowing\yunliwang\component\ReadCount',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'file' => [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['trace', 'info', 'error', 'warning'],
                ],
                'email' => [
                    'class' => 'yii\log\EmailTarget',
                    'levels' => ['error', 'warning'],
                    'message' => [
                        'to' => 'ljjgit@qq.com',
                    ],
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // 'useFileTransport' => true,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.qq.com',
                'port' => '465',
                'encryption' => 'ssl',
            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
            ],
        ],
    ],
    'bootstrap' => [
        'log',
    ],
];
