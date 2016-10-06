<?php

use yii\db\Schema;
use yii\db\Migration;

class m161003_234111_ciudades extends Migration
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
            '{{%ciudades}}',
            [
                'id_ciudad'=> $this->primaryKey(11),
                'id_estado'=> $this->integer(11)->notNull(),
                'ciudad'=> $this->string(200)->notNull(),
                'capital'=> $this->smallInteger(1)->notNull()->defaultValue(0),
            ],$tableOptions
        );
        $this->createIndex('id_estado','{{%ciudades}}','id_estado',false);
    }

    public function safeDown()
    {
        $this->dropIndex('id_estado', '{{%ciudades}}');
        $this->dropTable('{{%ciudades}}');
    }
}
