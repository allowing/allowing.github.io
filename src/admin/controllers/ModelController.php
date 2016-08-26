<?php

namespace allowing\yunliwang\admin\controllers;

use Exception;
use yii\web\Controller;
use allowing\yunliwang\model\Model;

class ModelController extends Controller
{
    public function actionIndex()
    {
        $models = Model::find()->all();
        return $this->render('index', ['models' => $models]);
    }

    public function actionDelete($name)
    {
        try {
            Model::deleteByName($name);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
