<?php

use yii\db\Migration;

/**
 * Handles the creation of table `brand`.
 */
class m171103_091209_create_brand_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('brand', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30)->comment("品牌名"),
            'intro' => $this->text()->comment("简介"),
            'logo' => $this->string(255)->comment("图片"),
            'sort' => $this->integer()->comment("排序"),
            'status' => $this->integer()->comment("状态"),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('brand');
    }
}
