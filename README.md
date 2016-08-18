# 数据库设计
    model
        name
        name_zh
        comment

    model_field
        model_name
        name
        name_zh
        comment


    model_record
        id
        model_name
        created_at
        updated_at

    model_record_ext
        model_record_id
        field
        value

```php
class Model extends \yii\db\ActiveRecord
{

}

class ModelField extends \yii\db\ActiveRecord
{

}

class ModelRecord extends \yii\db\ActiveRecord
{

}

class DynamicModel extends \yii\base\Model
{
    public static $name;

    public function attributes()
    {
        $commonFields = ModelRecord::getTableSchema()->getColumnNames();
        $fields = ModelField::find()->select(['name'])->where(['model_name' => static::$name])->column();
        return array_merge($commonFields, $fields);
    }

    public static function getDb()
    {
        return \Yii::$app->db;
    }

    public static function findOne()
    {

    }

    public static function findAll()
    {

    }
}
```