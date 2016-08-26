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
    public static function deleteByName($name)
    {
        static::findOne($name)->delete();
    }
}
