<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_cat`.
 */
class m161022_124523_create_article_cat_table extends Migration
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
        $this->createTable('article_cat', [
            'id' => $this->primaryKey()->notNull()->unsigned()->comment('主键'),
            'name' => $this->string()->notNull()->comment('分类名称'),
            'seo_name' => $this->string()->notNull()->defaultValue('')->comment('SEO名称'),
            'description' => $this->string()->notNull()->defaultValue('')->comment('描述'),
            'is_page' => $this->integer()->notNull()->defaultValue(0)->comment('是单页'),
            'is_link' => $this->integer()->notNull()->defaultValue(0)->comment('是链接'),
            'created_at' => $this->integer()->notNull()->unsigned()->comment('创建时间'),
            'updated_at' => $this->integer()->notNull()->unsigned()->comment('更新时间'),
            'content' => $this->text(),
        ], $tableOptions);
        $this->addCommentOnTable('article_cat', '文章分类表');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('article_cat');
    }
}
