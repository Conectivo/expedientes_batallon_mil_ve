<?php

use yii\db\Schema;
use yii\db\Migration;

class m161003_234112_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_parroquias_id_municipio','{{%parroquias}}','id_municipio','municipios',
'id_municipio');
    }

    public function safeDown()
    {
     $this->dropForeignKey('fk_parroquias_id_municipio', '{{%parroquias}}');
    }
}
