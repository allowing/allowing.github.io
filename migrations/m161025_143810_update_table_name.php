<?php

use yii\db\Migration;

class m161025_143810_update_table_name extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->renameTable('article_cat', 'cat');
    }

    public function safeDown()
    {
        $this->renameTable('cat', 'article_cat');
    }
}
