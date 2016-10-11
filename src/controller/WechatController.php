<?php

namespace allowing\yunliwang\controller;

use Yii;
use yii\web\Controller;

class WechatController extends Controller
{
    private $request;

    public function init()
    {
        parent::init();

        $this->request = Yii::getApp()->getRequest();
    }

    public function actionCallback()
    {
        return $this->request->get('echostr');
    }
}
