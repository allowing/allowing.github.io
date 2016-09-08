<?php

namespace allowing\yunliwang\model;

use yii\db\ActiveRecord;

/**
 * @property string $name 模型名称
 * @property string $name_zh 模型中文名称
 * @property string $comment 备注
 */
class Model extends ActiveRecord
{
    public function rules()
    {
        return [
            [['name', 'name_zh'], 'required'],
            [['name', 'name_zh'], 'string', 'max' => 30],
            ['comment', 'string', 'max' => 255],
        ];
    }

    public static function deleteByName($name)
    {
        return static::findOne($name)->delete();
    }

    public static function add(array $model)
    {
        $_this = new static();
        $_this->setAttributes($model);
        if (!$_this->validate()) {
            $invalid = new InvalidPropertyException();
            $invalid->setErrors($_this->getErrors());
            throw $invalid;
        }

        if (!$_this->save()) {
            
        }
        return true;
    }
}
