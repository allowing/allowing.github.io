<?php

return [
    'name' => '允梨网',
    'language' => 'zh-CN',
    'basePath' => dirname(__DIR__),
    'components' => [
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
    ],
    'bootstrap' => [
        'log',
    ],
];
