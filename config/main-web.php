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
            'suffix' => '.html',
            'rules' => [
                'GET <id:\d+>' => 'cat/view',
                'GET article/<id:\d+>' => 'article/view',
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
    ],
];
