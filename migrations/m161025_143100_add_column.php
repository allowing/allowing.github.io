<?php

use yii\db\ColumnSchemaBuilder;
use yii\db\Migration;
use yii\db\Schema;

class m161025_143100_add_column extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->addColumn('article_cat', 'type', (new ColumnSchemaBuilder(Schema::TYPE_INTEGER))
            ->notNull()
            ->defaultValue(0)
            ->comment('分类类型。比如文章，视频，用数字表示。0表示文章。默认0')
        );
    }

    public function safeDown()
    {
        $this->dropColumn('article_cat', 'type');
    }
}
