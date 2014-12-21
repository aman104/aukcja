<?php

/**
 * BaseSale
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property clob $description
 * @property integer $price
 * @property boolean $is_active
 * @property string $mother
 * @property string $father
 * @property string $breeder
 * @property string $owner
 * @property string $movie
 * @property Doctrine_Collection $Pictures
 * 
 * @method string              getName()        Returns the current record's "name" value
 * @method clob                getDescription() Returns the current record's "description" value
 * @method integer             getPrice()       Returns the current record's "price" value
 * @method boolean             getIsActive()    Returns the current record's "is_active" value
 * @method string              getMother()      Returns the current record's "mother" value
 * @method string              getFather()      Returns the current record's "father" value
 * @method string              getBreeder()     Returns the current record's "breeder" value
 * @method string              getOwner()       Returns the current record's "owner" value
 * @method string              getMovie()       Returns the current record's "movie" value
 * @method Doctrine_Collection getPictures()    Returns the current record's "Pictures" collection
 * @method Sale                setName()        Sets the current record's "name" value
 * @method Sale                setDescription() Sets the current record's "description" value
 * @method Sale                setPrice()       Sets the current record's "price" value
 * @method Sale                setIsActive()    Sets the current record's "is_active" value
 * @method Sale                setMother()      Sets the current record's "mother" value
 * @method Sale                setFather()      Sets the current record's "father" value
 * @method Sale                setBreeder()     Sets the current record's "breeder" value
 * @method Sale                setOwner()       Sets the current record's "owner" value
 * @method Sale                setMovie()       Sets the current record's "movie" value
 * @method Sale                setPictures()    Sets the current record's "Pictures" collection
 * 
 * @package    aukcje
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSale extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sale');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('description', 'clob', 65532, array(
             'type' => 'clob',
             'notnull' => false,
             'length' => 65532,
             ));
        $this->hasColumn('price', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 50,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 1,
             ));
        $this->hasColumn('mother', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('father', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('breeder', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('owner', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('movie', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('SalePicture as Pictures', array(
             'local' => 'id',
             'foreign' => 'sale_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'name',
              1 => 'description',
             ),
             ));
        $sluggable1 = new Doctrine_Template_Sluggable(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             'unique' => true,
             'canUpdate' => true,
             'uniqueBy' => 
             array(
              0 => 'lang',
              1 => 'name',
             ),
             'indexName' => 'sale_slug',
             ));
        $i18n0->addChild($sluggable1);
        $this->actAs($timestampable0);
        $this->actAs($i18n0);
    }
}