<?php

use yii\db\Migration;

/**
 * Class m171104_032358_create_article
 */
class m171104_032358_create_article extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('article',
            [
                'id'=>$this->primaryKey(),
                'name'=>$this->string()->comment("名称"),
                'article_category_id'=>$this->integer()->comment("文章分类"),
                'intro'=>$this->text()->comment("简介"),
                'status'=>$this->integer()->comment("状态"),
                'sort'=>$this->string()->comment("排序"),
                'inputtime'=>$this->integer()->comment("录入时间"),
            ]
        );

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171104_032358_create_article cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171104_032358_create_article cannot be reverted.\n";

        return false;
    }
    */
}
