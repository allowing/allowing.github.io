<?php

namespace allowing\yunliwang\controller;

use Yii;
use yii\web\Controller;
use yii\web\BadRequestHttpException;
use allowing\yunliwang\model\WechatServerIp;
use allowing\yunliwang\wechat\Key;

class WechatController extends Controller
{
    public $enableCsrfValidation = false;

    private $request;

    public function init()
    {
        parent::init();

        $this->request = $this->module->getRequest();
    }

    public function actionCallback()
    {
        $wechatServerIp = Yii::createObject(WechatServerIp::className());
        if (!$wechatServerIp->isWechatServerIp(Yii::$app->request->getUserIP())) {
            throw new BadRequestHttpException('此链接禁止非微信服务器访问');
        }

        $postData = file_get_contents('php://input'); // 获取原始的post请求数据
        $postObj = simplexml_load_string($postData, 'SimpleXMLElement', LIBXML_NOCDATA);

        switch ($postObj->MsgType) {
            case Key::MSG_TYPE_EVENT: // 'event'
                switch ($postObj->Event) {
                    case Key::EVENT_SUBSCRIBE: // 'subscribe'
                        return $this->subscribe($postObj);
                    case Key::EVENT_UNSUBSCRIBE: // 'unsubscribe'
                        return $this->unsubscribe($postObj);
                    default:
                        return;
                }

            case Key::MSG_TYPE_TEXT: // 'text'
                return $this->text($postObj);
            default:
                return;
        }
    }

    private function subscribe($postObj)
    {
        $time = time();
        return <<<MSG
            <xml>
                <ToUserName><![CDATA[{$postObj->FromUserName}]]></ToUserName>
                <FromUserName><![CDATA[{$postObj->ToUserName}]]></FromUserName>
                <CreateTime>{$time}</CreateTime>
                <MsgType><![CDATA[text]]></MsgType>
                <Content><![CDATA[http://allowing.weiwait.top]]></Content>
            </xml>
MSG;
    }

    private function unsubscribe($postObj)
    {
        return $this->subscribe($postObj);
    }

    private function text($postObj)
    {
        return $this->subscribe($postObj);
    }
}
