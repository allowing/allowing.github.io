<?php
Yii::$container->set(\yii\console\controllers\MigrateController::class, [
    'migrationPath' => '@app/resource/migrations',
]);
Yii::$container->set(\yii\data\Pagination::class, [
    'pageSize' => 100,
]);

Yii::setAlias('@resource', __DIR__ . '/resource');
Yii::setAlias('@allowing/yunliwang', __DIR__ . '/src');
