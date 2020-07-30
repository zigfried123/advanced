<?php

use yii\db\Migration;

/**
 * Class m200729_061143_add_service_table
 */
class m200729_061143_add_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('service', ['id'=>$this->primaryKey(),'name'=>$this->string(50),'code'=>$this->string(50), 'price'=>$this->float(2), 'description' => $this->string(255), 'status' => $this->boolean(), 'term' => $this->integer(), 'city' => $this->string(100)]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('service');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200729_061143_add_service_table cannot be reverted.\n";

        return false;
    }
    */
}
