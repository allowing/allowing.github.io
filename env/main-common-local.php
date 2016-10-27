<?php
/**
 * Created by PhpStorm.
 * User: 84770
 * Date: 2016/10/24
 * Time: 22:20
 */

return [
    'components' => [
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
            'dsn' => 'mysql:host=127.0.0.1;dbname=yunliwang',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
//            'enableSchemaCache' => true,
        ],
        'cache' => [
            'class' => \yii\caching\DummyCache::class,
        ],
    ],
];
