<?php

namespace allowing\yunliwang\model;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

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
    const SCENARIO_LOAD_INI_MD_CONTENT = 'loadIniMdContent';

    public $iniMdContent;

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
            [['cat_id', 'title'], 'required'],
            [['cat_id'], 'integer'],
            [['title', 'seo_title', 'description'], 'string', 'max' => 255],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cat::class, 'targetAttribute' => ['cat_id' => 'id']],
            [['iniMdContent'], 'required', 'on' => self::SCENARIO_LOAD_INI_MD_CONTENT],
        ];
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
        parent::setAttributes($values, $safeOnly);

        if ($this->scenario == self::SCENARIO_LOAD_INI_MD_CONTENT && isset($values['iniMdContent']) && $this->validate(['iniMdContent'])) {

            preg_match('/(.*?)\n\s*?\n/s', $this->iniMdContent, $match);

            $this->setAttributes(parse_ini_string($match[1]));
        }
    }
}
