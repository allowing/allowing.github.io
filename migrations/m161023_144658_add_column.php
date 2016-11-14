<?php

use yii\db\ColumnSchemaBuilder;
use yii\db\Migration;
use yii\db\Schema;

class m161023_144658_add_column extends Migration
{
    public function safeUp()
    {
        $this->addColumn('article_cat', 'keywords', new ColumnSchemaBuilder(Schema::TYPE_STRING));
        $this->addColumn('article', 'keywords', new ColumnSchemaBuilder(Schema::TYPE_STRING));
    }

    public function safeDown()
    {
        $this->dropColumn('article_cat', 'keywords');
        $this->dropColumn('article', 'keywords');
    }
}
