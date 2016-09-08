<?php

namespace allowing\yunliwang\admin\controllers;

use yii\web\Controller;
use allowing\yunliwang\model\ModelRecord;

class ModelRecordController extends Controller
{
    public function actionIndex()
    {
        $models = ModelRecord::find()->all();
        return $this->render('index', ['models' => $models]);
    }
}
