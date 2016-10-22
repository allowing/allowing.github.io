<?php

return [
    'id' => 'yunliwang',
    'language' => 'zh-CN',
    'basePath' => dirname(__DIR__),
    'viewPath' => dirname(__DIR__) . '/resource/views',
    'controllerNamespace' => 'allowing\yunliwang\controller',
    'components' => [
        /** @var \yii\web\UrlManager */
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            // 'suffix' => '.html', // PHP内置的服务器不支持
            'rules' => [
                'GET <action>' => 'site/<action>',
                'GET,POST article/create' => 'article/create',
                'GET article/<category:[A-Za-z0-9\-_]+>' => 'article/index',
                'GET article/<category:[A-Za-z0-9\-_]+>/<id:[A-Za-z0-9\-_]+>' => 'article/view',
            ],
        ],
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'file' => [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['trace', 'info', 'error', 'warning'],
                ],
                'email' => [
                    'class' => \yii\log\EmailTarget::class,
                    'levels' => ['error', 'warning'],
                    'message' => [
                        'subject' => '允梨教育应用日志',
                        'to' => 'ljjgit@qq.com',
                    ],
                ],
            ],
        ],
        'mailer' => [
            'class' => \yii\swiftmailer\Mailer::class,
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
