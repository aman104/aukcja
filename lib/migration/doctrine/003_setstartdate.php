<?php

class Setstartdate extends Doctrine_Migration_Base
{
  public function up()
  {
  	$auctions = AuctionTable::getInstance()->findAll();
  	foreach($auctions as $auction)
  	{
  		$auction->setStartDate($auction->getCreatedAt());
  		$auction->save();
  		unset($auction);
  	}
  }

  public function down()
  {
  }
}
