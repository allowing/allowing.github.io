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

class LearnController extends Controller
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

    public function actionIndex()
    {
        $learns = MarkdownArticle::findAll(Yii::getAlias('@app/markdown/learn'));
        return $this->render('index', [
            'learns' => $learns,
        ]);
    }

    public function actionLearn($title)
    {
        $learn = MarkdownArticle::findOne(Yii::getAlias('@app/markdown/learn'), $title);
        if (!$learn) {
            throw new NotFoundHttpException();
        }
        return $this->render('learn', [
            'learn' => $learn,
        ]);
    }

}