<?php

namespace allowing\yunliwang\model;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "article".
 *
 * @property string $id
 * @property string $article_cat_id
 * @property string $title
 * @property string $seo_title
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ArticleCat $articleCat
 * @property ArticleContent[] $articleContents
 */
class Article extends ActiveRecord
{
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_cat_id', 'title', 'created_at', 'updated_at'], 'required'],
            [['article_cat_id', 'created_at', 'updated_at'], 'integer'],
            [['title', 'seo_title', 'description'], 'string', 'max' => 255],
            [['article_cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleCat::className(), 'targetAttribute' => ['article_cat_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'article_cat_id' => '分类id',
            'title' => '标题',
            'seo_title' => 'SEO标题',
            'description' => '描述',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCat()
    {
        return $this->hasOne(ArticleCat::className(), ['id' => 'article_cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleContent()
    {
        return $this->hasOne(ArticleContent::className(), ['article_id' => 'id']);
    }
}
