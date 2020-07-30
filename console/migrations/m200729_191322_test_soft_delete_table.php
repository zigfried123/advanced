<?php

use yii\db\Migration;

/**
 * Class m200729_191322_test_soft_delete_table
 */
class m200729_191322_test_soft_delete_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('test_soft_delete', ['id'=>$this->primaryKey(), 'is_deleted'=>$this->boolean()]);
        $this->insert('test_soft_delete', ['is_deleted'=>true]);
        $this->insert('test_soft_delete', ['is_deleted'=>false]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('test_soft_delete');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200729_191322_test_soft_delete_table cannot be reverted.\n";

        return false;
    }
    */
}
