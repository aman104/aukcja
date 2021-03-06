<?php

/**
 * BaseAuctionHistory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $profile_id
 * @property integer $auction_id
 * @property integer $price_actual
 * @property integer $price_max
 * @property boolean $is_winner
 * @property boolean $buying_order
 * @property Profile $Profile
 * @property Auction $Auction
 * 
 * @method integer        getProfileId()    Returns the current record's "profile_id" value
 * @method integer        getAuctionId()    Returns the current record's "auction_id" value
 * @method integer        getPriceActual()  Returns the current record's "price_actual" value
 * @method integer        getPriceMax()     Returns the current record's "price_max" value
 * @method boolean        getIsWinner()     Returns the current record's "is_winner" value
 * @method boolean        getBuyingOrder()  Returns the current record's "buying_order" value
 * @method Profile        getProfile()      Returns the current record's "Profile" value
 * @method Auction        getAuction()      Returns the current record's "Auction" value
 * @method AuctionHistory setProfileId()    Sets the current record's "profile_id" value
 * @method AuctionHistory setAuctionId()    Sets the current record's "auction_id" value
 * @method AuctionHistory setPriceActual()  Sets the current record's "price_actual" value
 * @method AuctionHistory setPriceMax()     Sets the current record's "price_max" value
 * @method AuctionHistory setIsWinner()     Sets the current record's "is_winner" value
 * @method AuctionHistory setBuyingOrder()  Sets the current record's "buying_order" value
 * @method AuctionHistory setProfile()      Sets the current record's "Profile" value
 * @method AuctionHistory setAuction()      Sets the current record's "Auction" value
 * 
 * @package    aukcje
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAuctionHistory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('auction_history');
        $this->hasColumn('profile_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('auction_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('price_actual', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('price_max', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('is_winner', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
        $this->hasColumn('buying_order', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Profile', array(
             'local' => 'profile_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Auction', array(
             'local' => 'auction_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}