<?php
Yii::$container->set(\yii\console\controllers\MigrateController::class, [
    'migrationPath' => '@app/migrations',
])->set(\yii\data\Pagination::class, [
    'pageSize' => 1000,
]);
