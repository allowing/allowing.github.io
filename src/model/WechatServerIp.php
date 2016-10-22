<?php

namespace allowing\yunliwang\model;

use Yii;
use yii\base\Model;
use allowing\yunliwang\wechat\Key;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use Exception;
use GuzzleHttp\Client;

class WechatServerIp extends Model
{
    public $requestUrl = 'https://api.weixin.qq.com/cgi-bin/getcallbackip';

    public $verify = false;

    private $_accessToken;

    private $_ipList;

    private $_httpClient;

    public function __construct(
        AccessToken $accessToken,
        Client $httpClient,
        $config = []
    ) {
        $this->_accessToken = $accessToken;
        $this->_httpClient = $httpClient;

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

        $response = $this->_httpClient->get($this->requestUrl, [
            'query' => [
                'access_token' => $this->_accessToken->token,
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

        // 修复 ip 格式的错误
        $this->_ipList = $this->fixIpFormat($this->_ipList);

        return $this->_ipList;
    }

    public function isWechatServerIp($ip)
    {
        return ArrayHelper::isIn($ip, $this->getIpList());
    }

    /**
     * 修复不符合格式的 ip
     *
     * 在获取到的微信服务器 ip ，发现有下列的格式
     * ```
     *  [90] => 101.226.103.0/25
     *  [91] => 101.226.233.128/25
     *  [92] => 58.247.206.128/25
     *  [93] => 182.254.86.128/25
     *  [94] => 103.7.30.21
     *  [95] => 103.7.30.64/26
     *  [96] => 58.251.80.32/27
     *  [97] => 183.3.234.32/27
     *  [98] => 121.51.130.64/27
     * ```
     * 这里要去掉如 /25 的字符
     */
    private function fixIpFormat(array $ipList)
    {
        return array_map(function ($value) {
            if (false !== $position = strpos($value, '/')) {
                return substr($value, 0, $position);
            }
            return $value;
        }, $ipList);
    }
}
