<?php
/**
 * Created by PhpStorm.
 * User: 84770
 * Date: 2016/10/23
 * Time: 18:23
 */

namespace app\controllers;


use app\models\Cat;
use yii\base\Module;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Request;

class CatController extends Controller
{
    private $_request;

    public function __construct($id, Module $module, Request $request, array $config = [])
    {
        $this->_request = $request;

        parent::__construct($id, $module, $config);
    }

    /**
     * 请求单页
     */
    public function actionView($id)
    {
        $model = Cat::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException();
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}