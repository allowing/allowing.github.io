<?php

return [
    'language' => 'zh-CN',
    'basePath' => dirname(__DIR__),
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
    ],
];
