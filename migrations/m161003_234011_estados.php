<?php

use yii\db\Schema;
use yii\db\Migration;

class m161003_234011_estados extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%estados}}',
            [
                'id_estado'=> $this->primaryKey(11),
                'estado'=> $this->string(250)->notNull(),
                'iso_3166-2'=> $this->string(4)->notNull(),
            ],$tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%estados}}');
    }
}
