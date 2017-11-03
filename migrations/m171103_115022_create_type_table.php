<?php

use yii\db\Migration;

/**
 * Handles the creation of table `type`.
 */
class m171103_115022_create_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('type', [
            'id' => $this->primaryKey()->comment('شناسه'),
            'title' => $this->string(40)->comment('عنوان'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('type');
    }
}
