<?php

namespace allowing\yunliwang\model;

use Yii;
use yii\base\Model;
use allowing\yunliwang\wechat\Key;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use Exception;

class WechatServerIp extends Model
{
    public $requestUrl = 'https://api.weixin.qq.com/cgi-bin/getcallbackip';

    public $verify = false;

    private $_accessToken;

    private $_ipList;

    public function __construct(AccessToken $accessToken, $config = [])
    {
        $this->_accessToken = $accessToken;

        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['requestUrl'], 'required'],
            [['requestUrl'], 'string'],
        ];
    }

    public function getIpList()
    {
        if (!$this->validate()) {
            throw new Exception('属性验证不通过');
        }

        $response = Yii::$app->httpClient->get($this->requestUrl, [
            'query' => [
                'access_token' => $this->_accessToken->fetchToken(),
            ],
            'verify' => $this->verify,
        ]);

        if (200 != $statusCode = $response->getStatusCode()) {
            throw new Exception("微信服务器出现故障，响应状态码：$statusCode");
        }

        $data = Json::decode($response->getBody());

        if (ArrayHelper::keyExists(Key::ERROR, $data)) {
            throw new Exception(ArrayHelper::getValue(Key::ERROR_MESSAGE, $data));
        }

        $this->_ipList = ArrayHelper::getValue($data, Key::IP_LIST);

        return $this->_ipList;
    }

    public function isWechatServerIp($ip)
    {
        return ArrayHelper::isIn($ip, $this->getIpList());
    }
}
