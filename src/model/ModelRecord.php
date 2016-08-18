<?php

namespace allowing\yunliwang\model;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class ModelRecord extends ActiveRecord
{
    public function getModelRecordExt()
    {
        return $this->hasMany(ModelRecordExt::className(), ['model_record_id' => 'id']);
    }

    public static function findOneByModelName($modelName)
    {
        $model = static::find()->with('modelRecordExt')->asArray()->where(['model_name' => $modelName])->one();
        $model = static::field2Value($model);
        return $model;
    }

    public static function findAllByModelName($modelName)
    {
        $models = static::find()->with('modelRecordExt')->asArray()->where(['model_name' => $modelName])->all();
        foreach ($models as $key => $model) {
            $model = static::field2Value($model);
            $models[$key] = $model;
        }
        return $models;
    }

    private static function field2Value($model)
    {
        $modelRecordExt = ArrayHelper::remove($model, 'modelRecordExt');
        $modelRecordExt = ArrayHelper::map($modelRecordExt, 'field', 'value');
        $model = ArrayHelper::merge($model, $modelRecordExt);
        return $model;
    }
}
