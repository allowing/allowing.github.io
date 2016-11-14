<?php

use yii\db\ColumnSchemaBuilder;
use yii\db\Migration;
use yii\db\Schema;

class m161023_123226_add_column extends Migration
{
    public function safeUp()
    {
        // 标识可以用来构建强语义的url
        $this->addColumn('article_cat', 'identity', (new ColumnSchemaBuilder(Schema::TYPE_STRING))
            ->unique()
            ->comment('标识串')
        );

        // 排序
        $this->addColumn('article_cat', 'order', (new ColumnSchemaBuilder(Schema::TYPE_INTEGER))
            ->notNull()
            ->defaultValue(0)
            ->comment('排序')
        );

        // 父id
        $this->addColumn('article_cat', 'pid', (new ColumnSchemaBuilder(Schema::TYPE_INTEGER))
            ->notNull()
            ->unsigned()
            ->defaultValue(0)
            ->comment('排序')
        );

        // 标识串
        $this->addColumn('article', 'identity', (new ColumnSchemaBuilder(Schema::TYPE_STRING))
            ->unique()
            ->comment('标识串')
        );
    }

    public function safeDown()
    {
        $this->dropColumn('article_cat', 'identity');
        $this->dropColumn('article_cat', 'order');
        $this->dropColumn('article_cat', 'pid');
        $this->dropColumn('article', 'identity');
    }
}
