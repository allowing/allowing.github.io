<?php

return [
    'id' => 'yunliwang',
    'name' => '允梨网',
    'language' => 'zh-CN',
    'basePath' => __DIR__,
    'viewPath' => __DIR__ . '/resource/views',
    'controllerNamespace' => 'allowing\yunliwang\controller',
    'components' => [
        /** @var \yii\web\UrlManager */
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules' => [
                'GET <id:\d+>' => 'cat/view',
                'GET article/<id:\d+>' => 'article/view',
                'article/delete/<id:\d+>' => 'article/delete',
                [
                    'pattern' => 'articles',
                    'route' => 'article/index',
                    'suffix' => '/',
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
        'accessToken' => [
            'class' => \allowing\yunliwang\model\AccessToken::class,
            'appid' => 'wx12ffad600778b5bd',
            'secret' => '328a3c1cc9081cd660907ba7d6300deb',
        ],
        'httpClient' => [
            'class' => \GuzzleHttp\Client::class,
        ],
        'user' => [
            'identityClass' => \allowing\yunliwang\model\User::class,
            'enableAutoLogin' => true,
        ],
    ],
    'bootstrap' => [
        'log',
    ],
];
