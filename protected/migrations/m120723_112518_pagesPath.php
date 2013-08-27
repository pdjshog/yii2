<?php

class m120723_112518_pagesPath extends CDbMigration
{
    public function up()
    {
        $this->addColumn("tbl_staticpage", "path", "VARCHAR(64) DEFAULT NULL");
        $this->createIndex("static_page_path", "tbl_staticpage", "path", true);
    }

    public function down()
    {
        echo "m120723_112518_pagesPath does not support migration down.\n";
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