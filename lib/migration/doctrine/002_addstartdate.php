<?php

class Addstartdate extends Doctrine_Migration_Base
{
  public function up()
  {
  	$this->addColumn('auction', 'start_date', 'timestamp', null, array(
             'notnull' => '1',
             'format' => 'Y-m-d H:i:s'
  	));
  }

  public function down()
  {
  	$this->removeColumn('auction', 'start_date');
  }
}
