<?php

namespace allowing\yunliwang\model;

use yii\base\Model;

class ArticleForm extends Model
{
    public $catgory;
    public $title;
    public $id;
    public $content;

    public function rules()
    {
        return [
            [['catgory', 'title', 'id', 'content'], 'required'],
            ['catgory', 'in', 'range' => ['news', 'learn', 'experience']],
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
        $mda->dir = $dir;
        $mda->save();
    }
}
