<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Exception;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property string $title
 * @property string $seo_title
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $identity
 * @property string $keywords
 *
 * @property Cat $cat
 * @property ArticleContent[] $articleContents
 */
class Article extends ActiveRecord
{
    public $content;

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

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
            [['cat_id', 'title', 'content'], 'required'],
            [['cat_id'], 'integer'],
            [['title', 'seo_title', 'description'], 'string', 'max' => 255],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cat::class, 'targetAttribute' => ['cat_id' => 'id']],
        ];
    }

    public function transactions()
    {
        $transactions = parent::transactions();
        $transactions[self::SCENARIO_DEFAULT] = self::OP_INSERT | self::OP_DELETE;
        return $transactions;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Cat::className(), ['id' => 'cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleContent()
    {
        return $this->hasOne(ArticleContent::className(), ['article_id' => 'id']);
    }

    /**
     * @Override
     */
    public function setAttributes($values, $safeOnly = true)
    {
        if (isset($values['content'])) {
            $this->content = $values['content'];
            preg_match('/(.*?)\n\s*?\n(.*)/s', $this->content, $match);
            if (isset($match[1])) {
                parent::setAttributes(parse_ini_string($match[1]));
            }
            if (isset($match[2]) && (trim($match[2]) !== '')) {
                $this->content = $match[2];
            }
            unset($values['content']);
        }
        parent::setAttributes($values, $safeOnly);
    }

    public function afterSave($insert, $changedAttributes)
    {
        $articleContent = new ArticleContent();
        $articleContent->article_id = $this->id;
        $articleContent->content = $this->content;

        if (!$articleContent->save(false)) {
            throw new Exception('保存失败');
        }

        parent::afterSave($insert, $changedAttributes);
    }

    public function beforeDelete()
    {
        if (!$this->articleContent->delete()) {
            throw new Exception('删除失败');
        }

        return parent::beforeDelete();
    }
}
