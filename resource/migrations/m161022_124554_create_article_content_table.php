<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_content`.
 */
class m161022_124554_create_article_content_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('article_content', [
            'id' => $this->primaryKey()->notNull()->unsigned()->comment('主键'),
            'article_id' => $this->integer()->notNull()->unsigned()->comment('文章id'),
            'content' => $this->text(),
        ], $tableOptions);
        $this->addForeignKey('fk_article_id', 'article_content', 'article_id', 'article', 'id');
        $this->addCommentOnTable('article_content', '文章内容表');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('article_content');
    }
}
