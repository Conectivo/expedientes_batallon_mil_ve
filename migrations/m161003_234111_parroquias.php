<?php

use yii\db\Schema;
use yii\db\Migration;

class m161003_234111_parroquias extends Migration
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
            '{{%parroquias}}',
            [
                'id_parroquia'=> $this->primaryKey(11),
                'id_municipio'=> $this->integer(11)->notNull(),
                'parroquia'=> $this->string(250)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('id_municipio','{{%parroquias}}','id_municipio',false);
    }

    public function safeDown()
    {
        $this->dropIndex('id_municipio', '{{%parroquias}}');
        $this->dropTable('{{%parroquias}}');
    }
}
