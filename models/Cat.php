<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "article_cat".
 *
 * @property string $id
 * @property string $name
 * @property string $seo_name
 * @property string $description
 * @property integer $type
 * @property string $created_at
 * @property string $updated_at
 * @property string $content
 * @property string $keywords
 * @property string $identity
 * @property integer $order
 * @property integer $pid
 *
 * @property Article[] $articles
 */
class Cat extends ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * 文章类型
     */
    const TYPE_ARTICLE = 0;

    /**
     * 单页类型
     */
    const TYPE_PAGE = 10;

    /**
     * 外链类型
     */
    const TYPE_LINK = 20;

    public static function tableName()
    {
        return 'cat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['type'], 'integer'],
            [['content'], 'string'],
            [['name', 'seo_name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['article_cat_id' => 'id']);
    }

    public static function findNavModel()
    {
        return static::find()
            ->where(['pid' => 0])
            ->orderBy(['order' => SORT_ASC])
            ->addOrderBy(['created_at' => SORT_ASC])
            ->all();
    }
}
