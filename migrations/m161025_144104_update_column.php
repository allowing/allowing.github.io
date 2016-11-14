<?php

use yii\db\Migration;

class m161025_144104_update_column extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->dropForeignKey('fk_article_cat', 'article');
        $this->renameColumn('article', 'article_cat_id', 'cat_id');
        $this->addForeignKey('fk_cat_id', 'article', 'cat_id', 'cat', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_cat_id', 'article');
        $this->renameColumn('article', 'cat_id', 'article_cat_id');
        $this->addForeignKey('fk_article_cat', 'article', 'article_cat_id', 'cat', 'id');
    }
}
