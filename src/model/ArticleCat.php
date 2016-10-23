<?php

namespace allowing\yunliwang\model;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "article_cat".
 *
 * @property string $id
 * @property string $name
 * @property string $seo_name
 * @property string $description
 * @property integer $is_page
 * @property integer $is_link
 * @property string $created_at
 * @property string $updated_at
 * @property string $content
 *
 * @property Article[] $articles
 */
class ArticleCat extends ActiveRecord
{
    public static function tableName()
    {
        return 'article_cat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['is_page', 'is_link', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['name', 'seo_name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'name' => '分类名称',
            'seo_name' => 'SEO名称',
            'description' => '描述',
            'is_page' => '是单页',
            'is_link' => '是链接',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'content' => 'Content',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['article_cat_id' => 'id']);
    }
}
