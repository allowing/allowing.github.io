<?php

use yii\db\Migration;

class m161025_142734_update_fields extends Migration
{
    public function safeUp()
    {
        $this->dropColumn('article_cat', 'is_page');
        $this->dropColumn('article_cat', 'is_link');
    }

    public function safeDown()
    {
        echo '因为是删除字段，所以不提供恢复。可以再新建想要的字段';
    }
}
