<?php

namespace allowing\yunliwang\controller;

use Yii;
use yii\web\Controller;
use allowing\yunliwang\model\MarkdownArticle;
use yii\web\NotFoundHttpException;

class NewsController extends Controller
{
    public function actionIndex()
    {
        $newses = MarkdownArticle::findAll(Yii::$app->basePath . '/markdown/news');
        return $this->render('index', ['newses' => $newses]);
    }

    public function actionView($id)
    {
        $news = MarkdownArticle::findOne(Yii::$app->basePath . '/markdown/news', $id);
        if (!$news) {
            throw new NotFoundHttpException();
        }
        return $this->render('view', [
            'news' => $news,
        ]);
    }
}
