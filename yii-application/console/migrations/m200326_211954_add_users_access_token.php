<?php

use yii\db\Migration;

/**
 * Class m200326_211954_add_users_access_token
 */
class m200326_211954_add_users_access_token extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'access_token', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'access_token');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200326_211954_add_users_access_token cannot be reverted.\n";

        return false;
    }
    */
}
