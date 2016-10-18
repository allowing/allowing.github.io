<?php

namespace allowing\yunliwang\model;

use yii\base\Model;

class ArticleForm extends Model
{
    public $cat;
    public $title;
    public $id;
    public $content;

    public function rules()
    {
        return [
            [['cat', 'title', 'id', 'content'], 'required'],
            ['cat', 'in', 'range' => ['news', 'learn', 'experience']],
        ];
    }

    public function addToDir($dir)
    {
        if (!$this->validate()) {
            return false;
        }
        $mda = new MarkdownArticle();
        $mda->id = $this->id;
        $mda->title = $this->title;
        $mda->content = $this->content;
        $mda->cat = $this->cat;
        $mda->dir = $dir;
        $mda->save();
    }
}
