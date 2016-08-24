<?php

namespace allowing\yunliwang\model;

use Yii;
use yii\db\ActiveRecord;
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

    /**
     * 代理扩展表的字段
     *
     * 通过复写这个魔术方法，使得扩展字段也可以通过模型实例访问。
     * 首先尝试访问父类的该方法，如果捕获到不存在的属性异常，才开始处理。
     * 通过一对多的关系，查询给模型对应的所有扩展模型，遍历扩展模型，如果
     * 扩展模型的字段名字恰好是访问的属性名字，说明扩展模型的value值就是想要的值。
     * 如果遍历完毕依然没有找到，那就需要查看模型字段定义表，看看这个要访问的属性是不是
     * 已经定义的字段，如果是就返回null，表示这个字段没有录值。
     * @param string $property 字段名称
     * @return mixed 字段的值
     */
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

            // 查询是否有这个字段
            $hasField = ModelField::find()->where(['name' => $property])->exists();
            if ($hasField) {
                return null;
            }

            throw $e;
        }
    }
}
