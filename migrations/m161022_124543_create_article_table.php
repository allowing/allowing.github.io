<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m161022_124543_create_article_table extends Migration
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
        $this->createTable('article', [
            'id' => $this->primaryKey()->notNull()->unsigned()->comment('主键'),
            'article_cat_id' => $this->integer()->notNull()->unsigned()->comment('分类id'),
            'title' => $this->string()->notNull()->comment('标题'),
            'seo_title' => $this->string()->notNull()->defaultValue('')->comment('SEO标题'),
            'description' => $this->string()->notNull()->defaultValue('')->comment('描述'),
            'created_at' => $this->integer()->notNull()->unsigned()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->unsigned()->comment('更新时间'),
        ], $tableOptions);
        $this->addForeignKey('fk_article_cat', 'article', 'article_cat_id', 'article_cat', 'id');
        $this->addCommentOnTable('article', '文章表');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('article');
    }
}
