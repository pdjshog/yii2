<?php

class m120723_102943_staticPagesRegions extends CDbMigration
{
    public function up()
    {
        $this->addColumn("tbl_staticpage", "region", "VARCHAR(16) DEFAULT NULL");
    }

    public function down()
    {
        echo "m120723_102943_staticPagesRegions does not support migration down.\n";
        return false;
    }

    /*
     // Use safeUp/safeDown to do migration with transaction
     public function safeUp()
     {
     }

     public function safeDown()
     {
     }
     */
}