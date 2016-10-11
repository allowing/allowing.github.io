<?php

namespace allowing\yunliwang\controller;

use yii\web\Controller;
use allowing\yunliwang\model\AccessToken;

class WechatController extends Controller
{
    private $request;

    public function init()
    {
        parent::init();

        $this->request = $this->module->getRequest();
    }

    public function actionCallback()
    {
        $model = new AccessToken();
        $model->attributes = [
            'appid' => 'wx12ffad600778b5bd',
            'secret' => '328a3c1cc9081cd660907ba7d6300deb',
        ];

        return $model->fetchToken();
    }
}
