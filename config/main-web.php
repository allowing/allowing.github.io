<?php

return [
    'id' => 'yunliwang',
    'viewPath' => dirname(__DIR__) . '/resource/views',
    'controllerNamespace' => 'allowing\yunliwang\controller',
    'components' => [
        /** @var \yii\web\UrlManager */
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'GET <id:\d+>' => 'cat/view',
                'GET article/<id:\d+>' => 'article/view',
                [
                    'pattern' => 'articles',
                    'route' => 'article/index',
                    'suffix' => '.php',
                ],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'file' => [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => YII_DEBUG ?
                        ['trace', 'info', 'error', 'warning'] :
                        ['error', 'warning'],
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
