<?php
Yii::$container->setSingleton(\allowing\yunliwang\model\AccessToken::class, [
    'class' => \allowing\yunliwang\model\AccessToken::class,
    'appid' => 'wx12ffad600778b5bd',
    'secret' => '328a3c1cc9081cd660907ba7d6300deb',
]);
Yii::$container->setSingleton(\yii\web\Request::class);
Yii::$container->setSingleton(\yii\web\Response::class);
Yii::$container->setSingleton(\yii\caching\Cache::class, \yii\caching\FileCache::class);
Yii::$container->setSingleton(\yii\log\Logger::class);
Yii::$container->setSingleton(\yii\web\UrlManager::class);
Yii::$container->setSingleton(\GuzzleHttp\Client::class);

Yii::setAlias('@resource', dirname(__DIR__) . '/resource');
