<?php

use yii\db\Migration;

/**
 * Class m171104_033506_create_article_detail
 */
class m171104_033506_create_article_detail extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
         $this->createTable('article_detail',
             [
                 'article_id'=>$this->primaryKey(),
                 'content'=>$this->text(),
             ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171104_033506_create_article_detail cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171104_033506_create_article_detail cannot be reverted.\n";

        return false;
    }
    */
}
