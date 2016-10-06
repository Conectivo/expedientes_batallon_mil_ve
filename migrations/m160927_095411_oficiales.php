<?php

use yii\db\Schema;
use yii\db\Migration;

class m160927_095411_oficiales extends Migration
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
            '{{%oficiales}}',
            [
                'id'=> $this->primaryKey(11),
                'nombres'=> $this->string(20)->notNull(),
                'apellido'=> $this->string(20)->notNull(),
                'cedula'=> $this->integer(11)->notNull(),
                'situacion'=> $this->char(1)->notNull(),
                'email'=> $this->string(50)->null()->defaultValue(null),
                'arma'=> $this->string(20)->notNull(),
                'cargo'=> $this->string(20)->notNull(),
                'direccion'=> $this->string(50)->notNull(),
                'telefono'=> $this->integer(11)->notNull(),
                'direccion_emergencia'=> $this->string(50)->notNull(),
                'telefonos_emergencia'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('id','{{%oficiales}}','id',false);
        $this->createIndex('cedula','{{%oficiales}}','cedula',false);
        $this->createIndex('email','{{%oficiales}}','email',false);
    }

    public function safeDown()
    {
        $this->dropIndex('id', '{{%oficiales}}');
        $this->dropIndex('cedula', '{{%oficiales}}');
        $this->dropIndex('email', '{{%oficiales}}');
        $this->dropTable('{{%oficiales}}');
    }
}
