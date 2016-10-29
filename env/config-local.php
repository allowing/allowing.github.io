<?php

return [
    'components' => [
        'urlManager' => [
            'suffix' => '',
        ],
        'request' => [
            'cookieValidationKey' => '654ad6sg879^&*(()rgd8&%^3409',
        ],
        'mailer' => [
            'useFileTransport' => true,
            'transport' => [
                'username' => 'ljjgit@qq.com',
                'password' => 'cizszdhdevjnjgbi',
            ],
            'messageConfig'=>[
                'from' => [
                    'ljjgit@qq.com' => '允梨教育官网'
                ],
            ],
        ],
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=120.24.225.153;dbname=yunliwang',
//            'dsn' => 'mysql:host=127.0.0.1;dbname=yunliwang',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
//            'enableSchemaCache' => true,
        ],
        'cache' => [
            'class' => \yii\caching\DummyCache::class,
        ],
    ],
    'modules' => [
        'gii' => [
            'class' => \yii\gii\Module::class,
        ],
        'debug' => [
            'class' => \yii\debug\Module::class,
        ],
    ],
    'bootstrap' => ['gii', 'debug'],
];
