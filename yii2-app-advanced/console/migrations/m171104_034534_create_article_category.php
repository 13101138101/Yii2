<?php

use yii\db\Migration;

/**
 * Class m171104_034534_create_article_category
 */
class m171104_034534_create_article_category extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
         $this->createTable('article_category',
             [
                 'id'=>$this->primaryKey(),
                 'name'=>$this->string()->comment("名称"),
                 'intro'=>$this->text()->comment("简介"),
                 'status'=>$this->integer()->comment("状态"),
                 'sort'=>$this->integer()->comment("排序"),
                 'is_help'=>$this->integer()->comment("是不是帮助相关的分类"),
             ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171104_034534_create_article_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171104_034534_create_article_category cannot be reverted.\n";

        return false;
    }
    */
}
