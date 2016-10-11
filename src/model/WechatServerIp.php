<?php

namespace allowing\yunliwang\model;

use Yii;
use yii\base\Model;
use yii\caching\Cache;
use allowing\yunliwang\wechat\Key;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use Exception;

class WechatServerIp extends Model
{
    public $requestUrl = 'https://api.weixin.qq.com/cgi-bin/getcallbackip';

    public $verify = false;

    public $cacheTime = 0;

    private $_accessToken;

    private $_cache;

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
            [['cacheTime'], 'integer'],
        ];
    }

    public function setCache(Cache $cache)
    {
        $this->_cache = $cache;
        return $this;
    }

    public function getCaceh()
    {
        if ($this->_cache === null) {
            $this->_cache = Yii::$app->cache;
        }
        return $this->_cache;
    }

    public function fetchIpList()
    {
        if (!$this->validate()) {
            throw new Exception('属性验证不通过');
        }

        $cacheKey = __METHOD__ . 'wechatServerIp';

        if (!$this->getCaceh()->exists($cacheKey)) {
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

            $ipList = ArrayHelper::getValue($data, Key::IP_LIST);

            if ($this->cacheTime) {
                $this->getCaceh()->set(
                    $cacheKey,
                    $ipList,
                    $this->cacheTime
                );
            }

            return $ipList;
        }
        return $this->getCaceh()->get($cacheKey);
    }

    public function isWechatServerIp($ip)
    {
        return ArrayHelper::isIn($ip, $this->fetchIpList());
    }
}
