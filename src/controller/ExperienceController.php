<?php

namespace allowing\yunliwang\controller;

use Yii;
use yii\web\Controller;
use allowing\yunliwang\model\MarkdownArticle;

class ExperienceController extends Controller
{
    public function actionIndex()
    {
        $models = MarkdownArticle::findAll(Yii::getAlias('@app/markdown/experience'));
        return $this->render('index', ['models' => $models]);
    }

    public function actionView($id)
    {
        $model = MarkdownArticle::findOne(Yii::getAlias('@app/markdown/experience'), $id);
        if (!$model) {
            throw new NotFoundHttpException();
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
