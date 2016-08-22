<?php

namespace allowing\yunliwang\model;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\base\UnknownPropertyException;

class ModelRecord extends ActiveRecord
{
    public function getModelRecordExts()
    {
        return $this->hasMany(ModelRecordExt::className(), ['model_record_id' => 'id']);
    }

    public static function findOneByModelName($modelName)
    {
        return static::findOne(['model_name' => $modelName]);
    }

    public static function findAllByModelName($modelName)
    {
        return static::findAll(['model_name' => $modelName]);
    }

    public function __get($property)
    {
        try {
            return parent::__get($property);
        } catch (UnknownPropertyException $e) {
            foreach ($this->modelRecordExts as $modelRecordExt) {
                if ($modelRecordExt->field == $property) {
                    return $modelRecordExt->value;
                }
            }



            throw $e;
        }
    }
}
