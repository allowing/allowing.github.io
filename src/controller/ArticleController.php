<?php
/**
 * Created by PhpStorm.
 * User: allowing
 * Date: 2016/8/13
 * Time: 15:27
 */

namespace allowing\yunliwang\controller;


use allowing\yunliwang\model\MarkdownArticle;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ArticleController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['get'],
                    'learn' => ['get'],
                ],
            ],
        ];
    }

    public function actionIndex($category)
    {
        $models = MarkdownArticle::findAll(Yii::getAlias("@app/markdown/$category"));
        if (!$models) {
            throw new NotFoundHttpException();
        }
        return $this->render('index', [
            'title' => '文章列表',
            'category' => $category,
            'models' => $models,
        ]);
    }

    public function actionView($id, $category)
    {
        $model = MarkdownArticle::findOne(Yii::getAlias("@app/markdown/$category"), $id);
        if (!$model) {
            throw new NotFoundHttpException();
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }

}