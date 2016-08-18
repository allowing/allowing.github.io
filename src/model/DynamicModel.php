<?php

namespace allowing\yunliwang\model;

use yii\db\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;
use Exception;
use InvalidArgumentException;

class DynamicModel extends ActiveRecord
{
    private static $_modelName;

    public static function tableName()
    {
        throw new Exception('No table name');
    }

    public static function setModelName($modelName)
    {
        static::$_modelName = $modelName;
    }

    public static function getModelName()
    {
        if (null === static::$_modelName) {
            throw new Exception('Model name is required. you can call setModelName() set a model name.');
        }

        return static::$_modelName;
    }

    public function attributes()
    {
        $commonFields = ModelRecord::getTableSchema()->getColumnNames();
        $extFields = ModelField::find()->select(['name'])->where(['model_name' => static::getModelName()])->column();
        return ArrayHelper::merge($commonFields, $extFields);
    }

    public static function populateRecord($record, $row)
    {
        throw new Exception('Can not populate the model');
    }

    public static function findOne($pk)
    {
        if (is_array($pk)) {
            throw new InvalidArgumentException('Argument can not be an array.');
        }
        $someRecord = ModelRecord::find()
            ->asArray()
            ->where([
                ModelRecord::getTableSchema()->primaryKey[0] => $pk
            ])
            ->one();
        $extRecord = ModelRecordExt::find()
            ->asArray()
            ->where([
                ModelRecordExt::getTableSchema()->primaryKey[0] => $pk
            ])
            ->one();
        // 重建哈希表
        $extRecord = [$extRecord['field'] => $extRecord['value']];
        $record = ArrayHelper::merge($someRecord, $extRecord);

        $_this = new static($record);
        return $_this;
    }

    public static function findAll($condition = null)
    {
        if (null !== $condition) {
            throw new InvalidArgumentException('The method do not need arguments');
        }

        $rows = ModelRecord::find()->asArray()->with('modelRecordExt')->all();
print_r($rows);
    }
}
