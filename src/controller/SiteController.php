<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/13
 * Time: 14:34
 */

namespace allowing\yunliwang\controller;

use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCourse()
    {
        return $this->render('course');
    }

    public function actionOutline()
    {
        return $this->render('outline');
    }

    public function actionCase()
    {
        return $this->render('case');
    }

    public function actionTest()
    {
        // \allowing\yunliwang\model\DynamicModel::setModelName('learn');
        // $dModel = \Yii::createObject(\allowing\yunliwang\model\DynamicModel::class);
        // print_r($dModel->attributes());
        // $model = $dModel->findOne(1);
        // print_r($model);
        // foreach ($model as $key => $value) {
        //     echo $key, '|';
        // }
        // $models = \allowing\yunliwang\model\DynamicModel::findAll();
        // print_r($models);
        // print_r(\allowing\yunliwang\model\ModelRecord::findOneByModelName('learn'));
    }
}