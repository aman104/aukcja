<?php

/**
 * Profile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    aukcje
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Profile extends BaseProfile
{

	public function getActualAuctions()
	{
		$q = Doctrine_Query::create()
			->from('Auction a')
			->leftJoin('a.AuctionHistory h')
			->where('h.profile_id =?', $this->getPrimaryKey())
			->andWhere('expired_at >?', date('Y-m-d H:i:s', time()))
    		->orderBy('expired_at asc');

    	return $q->execute();
	}

	public function getEndAuctions()
	{
		$q = Doctrine_Query::create()
			->from('Auction a')
			->leftJoin('a.AuctionHistory h')
			->where('h.profile_id =?', $this->getPrimaryKey())
			->andWhere('expired_at <?', date('Y-m-d H:i:s', time()))
			->andWhere('h.is_winner =?', true)
    		->orderBy('expired_at asc');

    	return $q->execute();
	}

}