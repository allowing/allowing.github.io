<?php

namespace allowing\yunliwang\admin\controllers;

use Exception;
use yii\web\Controller;
use allowing\yunliwang\model\Model;
use Yii;

class ModelController extends Controller
{
    public function actionIndex()
    {
        $models = Model::find()->all();
        return $this->render('index', ['models' => $models]);
    }

    public function actionAdd()
    {
        $model = new Model();
        $model->setAttributes(Yii::$app->request->post());
        if (!$model->save() && $model->hasError()) {
            print_r($model->getErrors());
        } else {

        }
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
