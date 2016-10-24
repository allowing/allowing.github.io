<?php
/**
 * Created by PhpStorm.
 * User: 84770
 * Date: 2016/10/23
 * Time: 18:23
 */

namespace allowing\yunliwang\controller;


use allowing\yunliwang\model\ArticleCat;
use yii\base\Module;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Request;

class ArticleCatController extends Controller
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
        $model = ArticleCat::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException();
        }

        if ($model->is_link) {
            return $this->redirect($model->content);
        }

        // 暂时用重定向解决
        if (!$model->is_page) {
            return $this->redirect(['article/index', 'article_cat_id' => $id]);
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}