<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ads`.
 */
class m170812_160433_create_ads_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('ads', [
            'id' => $this->primaryKey(),
            'title' => $this->string(50)->notNull(),
            'description' => $this->text()->notNull(),
            'image_name' => $this->string(100),
            'status' => $this->boolean(),
            'plan_id' => $this->integer(),
            'category_id' => $this->integer(),
            'user_id' => $this->integer(),
            'created_at' => $this->string(30), 
            'updated_at' => $this->string(30)
        ]);
        $this->insert('ads', [
            'title' => 'وب کندو',
            'description' => 'دانلود قالب رایگان وردپرس',
            'status' => 1,
            'plan_id' => 1,
            'category_id' =>1,
            'user_id' => 1,
            'created_at' => time().'',
            'updated_at' => time().'',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('ads');
    }
}
