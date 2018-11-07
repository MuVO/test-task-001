<?php

use yii\db\Migration;

/**
 * Class m181107_121021_table_customers
 */
class m181107_121021_table_customers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(\app\models\Customer::tableName(),
            [
                'id' => $this->primaryKey(),
                'type' => $this->string()->notNull(),
                'email' => $this->string()->notNull(),
                'full_name' => $this->string()->notNull(),
                'inn' => $this->string(12),
                'company_name' => $this->string(),
            ]);
        $this->createIndex('IDX_type', \app\models\Customer::tableName(), 'type');
        $this->createIndex('UK_email', \app\models\Customer::tableName(), 'email', true);
        $this->createIndex('UK_inn', \app\models\Customer::tableName(), 'inn', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(\app\models\Customer::tableName());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181107_121021_table_customers cannot be reverted.\n";

        return false;
    }
    */
}
