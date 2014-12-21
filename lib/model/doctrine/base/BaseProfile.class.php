<?php

/**
 * BaseProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $sf_guard_user_id
 * @property string $uid
 * @property string $phone
 * @property string $mobile
 * @property string $street
 * @property string $post_code
 * @property string $city
 * @property string $country
 * @property string $skype
 * @property string $gg
 * @property boolean $is_deleted
 * @property sfGuardUser $sfGuardUser
 * @property Doctrine_Collection $AuctionHistory
 * 
 * @method integer             getSfGuardUserId()    Returns the current record's "sf_guard_user_id" value
 * @method string              getUid()              Returns the current record's "uid" value
 * @method string              getPhone()            Returns the current record's "phone" value
 * @method string              getMobile()           Returns the current record's "mobile" value
 * @method string              getStreet()           Returns the current record's "street" value
 * @method string              getPostCode()         Returns the current record's "post_code" value
 * @method string              getCity()             Returns the current record's "city" value
 * @method string              getCountry()          Returns the current record's "country" value
 * @method string              getSkype()            Returns the current record's "skype" value
 * @method string              getGg()               Returns the current record's "gg" value
 * @method boolean             getIsDeleted()        Returns the current record's "is_deleted" value
 * @method sfGuardUser         getSfGuardUser()      Returns the current record's "sfGuardUser" value
 * @method Doctrine_Collection getAuctionHistory()   Returns the current record's "AuctionHistory" collection
 * @method Profile             setSfGuardUserId()    Sets the current record's "sf_guard_user_id" value
 * @method Profile             setUid()              Sets the current record's "uid" value
 * @method Profile             setPhone()            Sets the current record's "phone" value
 * @method Profile             setMobile()           Sets the current record's "mobile" value
 * @method Profile             setStreet()           Sets the current record's "street" value
 * @method Profile             setPostCode()         Sets the current record's "post_code" value
 * @method Profile             setCity()             Sets the current record's "city" value
 * @method Profile             setCountry()          Sets the current record's "country" value
 * @method Profile             setSkype()            Sets the current record's "skype" value
 * @method Profile             setGg()               Sets the current record's "gg" value
 * @method Profile             setIsDeleted()        Sets the current record's "is_deleted" value
 * @method Profile             setSfGuardUser()      Sets the current record's "sfGuardUser" value
 * @method Profile             setAuctionHistory()   Sets the current record's "AuctionHistory" collection
 * 
 * @package    aukcje
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('profile');
        $this->hasColumn('sf_guard_user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('uid', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('phone', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('mobile', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('street', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('post_code', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('city', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('country', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('skype', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('gg', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('is_deleted', 'boolean', null, array(
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
        $this->hasOne('sfGuardUser', array(
             'local' => 'sf_guard_user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('AuctionHistory', array(
             'local' => 'id',
             'foreign' => 'profile_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}