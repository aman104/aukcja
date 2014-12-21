<?php

class Setposition extends Doctrine_Migration_Base
{
  public function up()
  {
  	$auctions = AuctionTable::getInstance()->findAll();
  	foreach($auctions as $auction)
  	{
  		$pictures = $auction->getPictures();

  		$i = 1;
  		foreach($pictures as $picture)
  		{
  			$picture->setPosition($i++);
  			$picture->save();
  			unset($picture);
  		}
  		unset($pictures);
  		unset($auction);
  	}
  }

  public function down()
  {
  	$pictures = PictureTable::getInstance()->findAll();
  	foreach($pictures as $picture)
	{
		$picture->setPosition(0);
		$picture->save();
		unset($picture);
	}
  }
}
