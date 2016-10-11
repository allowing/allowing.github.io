<?php

namespace allowing\yunliwang\model;

use Yii;
use yii\base\Model;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

class AccessToken extends Model
{
    const KEY_ACCESS_TOKEN = 'access_token';

    public $requestUrl = 'https://api.weixin.qq.com/cgi-bin/token';

    public $appid;

    public $secret;

    public $grantType = 'client_credential';

    public $verify = false;

    public function rules()
    {
        return [
            [['requestUrl', 'appid', 'secret', 'grantType'], 'required'],
        ];
    }

    public function fetchToken()
    {
        if (!$this->validate()) {
            return false;
        }
        $response = Yii::$app->httpClient->get($this->requestUrl, [
            'query' => [
                'grant_type' => $this->grantType,
                'appid' => $this->appid,
                'secret' => $this->secret,
            ],
            'verify' => $this->verify,
        ]);
        return ArrayHelper::getValue(Json::decode($response->getBody()), self::KEY_ACCESS_TOKEN);
    }
}
