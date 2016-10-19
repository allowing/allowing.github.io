<?php

namespace allowing\yunliwang\model;

use yii\base\Model;
use Exception;

class ArticleForm extends Model
{
    public $category;
    public $title;
    public $id;
    public $content;

    public function rules()
    {
        return [
            [['category', 'title', 'content'], 'required'],
            ['id', 'default', 'value' => uniqid()],
            ['category', 'in', 'range' => ['news', 'learn', 'experience']],
        ];
    }

    public function addToDir($dir)
    {
        if (!$this->validate()) {
            throw new Exception('属性验证不通过');
        }
        $mda = new MarkdownArticle();
        $mda->id = $this->id;
        $mda->title = $this->title;
        $mda->content = $this->content;
        $mda->dir = $dir;
        $mda->save();
    }
}
