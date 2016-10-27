<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';

Yii::$container->setSingleton(\allowing\yunliwang\model\AccessToken::class, [
    'appid' => 'wx12ffad600778b5bd',
    'secret' => '328a3c1cc9081cd660907ba7d6300deb',
]);
Yii::$container->setSingleton(\yii\web\Request::class);
Yii::$container->setSingleton(\yii\web\Response::class);
Yii::$container->setSingleton(\yii\caching\Cache::class, \yii\caching\FileCache::class);
Yii::$container->setSingleton(\yii\log\Logger::class);
Yii::$container->setSingleton(\yii\web\UrlManager::class);
Yii::$container->setSingleton(\GuzzleHttp\Client::class);
Yii::$container->setSingleton(\yii\redis\Cache::class);

Yii::$container->set(\yii\console\controllers\ServeController::class, [
    'docroot' => '@app/public',
]);
Yii::$container->set(\yii\console\controllers\MigrateController::class, [
    'migrationPath' => '@app/resource/migrations',
]);
Yii::$container->set(\yii\data\Pagination::class, [
    'pageSize' => 100,
]);

Yii::setAlias('@resource', dirname(__DIR__) . '/resource');
Yii::setAlias('@allowing/yunliwang', dirname(__DIR__) . '/src');
