<?php

class AddToSale extends Doctrine_Migration_Base
{
  public function up()
  {
  	$this->addColumn('sale', 'mother', 'string', '255', array('notnull' => false));
  	$this->addColumn('sale', 'father', 'string', '255', array('notnull' => false));
  	$this->addColumn('sale', 'breeder', 'string', '255', array('notnull' => false));
  	$this->addColumn('sale', 'owner', 'string', '255', array('notnull' => false));
  	$this->addColumn('sale', 'movie', 'string', '255', array('notnull' => false));
  }

  public function down()
  {
  	$this->removeColumn('sale', 'mother');
  	$this->removeColumn('sale', 'father');
  	$this->removeColumn('sale', 'breeder');
  	$this->removeColumn('sale', 'owner');
  	$this->removeColumn('sale', 'movie');
  }
}
