<?php

namespace allowing\yunliwang\model;

use yii\base\Model;

class ArticleCat extends Model
{
    public $name;

    public $identity;

    public $keywords;

    public $description;

    public static function findByIdentity($identity)
    {
        return new static(static::fetchCatDataByIdentity($identity));
    }

    private static function fetchCatDataByIdentity($identity)
    {
        return static::fetchCatData()[$identity];
    }

    private static function fetchCatData()
    {
        return [
            'learn' => [
                'name' => '免费教程',
                'identity' => 'learn',
                'keywords' => 'php教程,git教程,java教程,git视频',
                'description' => '这里是允梨教育原创的免费学习教程',
            ],
            'news' => [
                'name' => '公司新闻',
                'identity' => 'news',
                'keywords' => '允梨动态,新闻',
                'description' => '关于允梨教育公司的新闻和动态',
            ],
            'experience' => [
                'name' => '杂谈',
                'identity' => 'experience',
                'keywords' => 'php杂谈,代码格式,优化,psr',
                'description' => '谈谈理想、谈谈人生、谈谈技术',
            ],
        ];
    }
}

