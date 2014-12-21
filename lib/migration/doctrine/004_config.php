<?php

class Version4 extends Doctrine_Migration_Base
{
  public function up()
  {
  $this->createTable('auction_config', array(
     'id' => 
     array(
    'type' => 'integer',
    'length' => '8',
    'autoincrement' => '1',
    'primary' => '1',
     ),
     'name' => 
     array(
    'type' => 'string',
    'notnull' => '1',
    'unique' => '1',
    'length' => '255',
     ),
     'value' => 
     array(
    'type' => 'string',
    'notnull' => '',
    'length' => '255',
     ),
     'created_at' => 
     array(
    'notnull' => '1',
    'type' => 'timestamp',
    'length' => '25',
     ),
     'updated_at' => 
     array(
    'notnull' => '1',
    'type' => 'timestamp',
    'length' => '25',
     ),
     ), array(
     'type' => 'INNODB',
     'primary' => 
     array(
    0 => 'id',
     ),
     'collate' => 'utf8_unicode_ci',
     'charset' => 'utf8',
     ));
  }

  public function down()
  {
  $this->dropTable('auction_config');
  }
}

