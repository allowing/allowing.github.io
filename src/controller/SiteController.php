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
}