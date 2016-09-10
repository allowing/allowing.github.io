<?php

namespace allowing\yunliwang\component;

use Yii;
use yii\base\Component;

/**
 * 统计阅读量组件
 *
 * 因为用到全局缓存组件，调用 get() 和 increment() 的时候，要求传递 id，
 * 这个 id 要全局唯一，不然会冲突。
 */
class ReadCount extends Component
{
    private $_clientKey = '___readCountClient';

    public function setClientKey($key)
    {
        $this->_clientKey = $key;
    }

    public function get($id)
    {
        $readCount = Yii::$app->cache->get($id);
        $readCount = $readCount ? $readCount : 0;
        return $readCount;
    }

    public function increment($id)
    {
        $session = Yii::$app->session;
        $cache = Yii::$app->cache;

        $client = $session->get($this->_clientKey);
        if (!$client) {
            // 用唯一 id 标识一下这个客户端
            $client = uniqid();
            $session->set($this->_clientKey, $client);
        }

        if (!$cache->exists($client . $id)) {
            $cache->set($client . $id, 1, 3600);
            $cache->set($id, $this->get($id) + 1);
        }
    }
}
