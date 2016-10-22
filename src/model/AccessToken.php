<?php

namespace allowing\yunliwang\model;

use Yii;
use yii\base\Model;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\caching\Cache;
use Exception;
use allowing\yunliwang\wechat\Key;

class AccessToken extends Model
{
    public $requestUrl = 'https://api.weixin.qq.com/cgi-bin/token';

    public $appid;

    public $secret;

    public $grantType = 'client_credential';

    public $verify = false;

    public $_cache;

    public function __construct(Cache $cache, $config = [])
    {
        $this->_cache = $cache;

        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['requestUrl', 'appid', 'secret', 'grantType'], 'required'],
        ];
    }

    public function getToken()
    {
        if (!$this->validate()) {
            throw new Exception('属性验证不通过');
        }

        $cacheKey = __METHOD__ . 'accessToken';

        if (!$this->_cache->exists($cacheKey)) {
            $response = Yii::$app->httpClient->get($this->requestUrl, [
                'query' => [
                    'grant_type' => $this->grantType,
                    'appid' => $this->appid,
                    'secret' => $this->secret,
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

            $accessToken = ArrayHelper::getValue($data, Key::ACCESS_TOKEN);

            $this->_cache->set(
                $cacheKey,
                $accessToken,
                ArrayHelper::getValue($data, Key::TOKEN_EXPIRE)
            );

            return $accessToken;
        }
        return $this->_cache->get($cacheKey);
    }
}
