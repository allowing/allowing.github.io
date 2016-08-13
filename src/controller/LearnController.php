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

class LearnController extends Controller
{
    public function actionIndex()
    {
        $learns = MarkdownArticle::findAll(Yii::$app->basePath . '/markdown/learn');
        return $this->render('index', [
            'learns' => $learns,
        ]);
    }

    public function actionLearn($title)
    {
        $learn = MarkdownArticle::findOne(Yii::$app->basePath . '/markdown/learn', $title);
        return $this->render('learn', [
            'learn' => $learn,
        ]);
    }

}