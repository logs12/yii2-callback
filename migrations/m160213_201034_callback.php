<?php

use yii\db\Schema;
use yii\db\Migration;

class m160213_201034_callback extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%callback}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'phone' => $this->string(32)->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'entity' => $this->string()->unique()." COMMENT 'привязка к месту вызова'",
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%callback}}');

        return false;
    }
}
