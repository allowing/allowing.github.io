<?php

namespace allowing\yunliwang\controller;

use Yii;
use yii\web\Controller;
use yii\web\Request;
use yii\web\BadRequestHttpException;
use allowing\yunliwang\model\WechatServerIp;
use allowing\yunliwang\wechat\Key;
use yii\log\Logger;

class WechatController extends Controller
{
    const KEY_SIMPLE_XML_ELEMENT = 'SimpleXMLElement';

    public $enableCsrfValidation = false;

    private $_request;

    private $_logger;

    public function __construct(
        $id,
        $module,
        Request $request,
        Logger $logger,
        $config = []
    ) {
        $this->_request = $request;
        $this->_logger = $logger;

        parent::__construct($id, $module, $config);
    }

    public function actionCallback()
    {
        $wechatServerIp = Yii::createObject(WechatServerIp::class);
        if (YII_DEBUG) {
            $this->_logger->log($wechatServerIp->ipList, Logger::LEVEL_TRACE);
        }
        if (!$wechatServerIp->isWechatServerIp($this->_request->getUserIP())) {
            throw new BadRequestHttpException('此链接禁止非微信服务器访问');
        }

        $postData = file_get_contents('php://input'); // 获取原始的post请求数据
        $postObj = simplexml_load_string($postData, self::KEY_SIMPLE_XML_ELEMENT, LIBXML_NOCDATA);

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
