<?php

/**
 * Auction form.
 *
 * @package    aukcje
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AuctionForm extends BaseAuctionForm
{

  public function configure()
  {
  	unset($this['created_at']);
  	unset($this['updated_at']);
  	
  	unset($this['is_end']);

    $this->embedI18n(array('pl', 'en', 'cn'));

  	$this->widgetSchema['expired_at'] = new sfWidgetFormDateTime();
    $this->widgetSchema['expired_at']->setDefault(time() + (7 * 24 * 60 * 60));

    $this->widgetSchema['start_date'] = new sfWidgetFormDateTime();
    $this->widgetSchema['start_date']->setDefault(time());

  	$this->widgetSchema['sex'] = new sfWidgetFormSelect(array(
  			'choices' => array('Samiec' => 'Samiec', 'Samica' => 'Samica', 'Młody' => 'Młody')
  		));
      
    $pictureForm = new PictureBackendForm();

    $this->embedForm('picture', $pictureForm);
    $this->widgetSchema['picture']->setLabel('Dodaj obrazek');

  }

  public function save($con = null)
  {
    $values = $this->getValues();

    $auction = parent::save($con);

    if(count($values['picture']['file']) > 0)
    {
      $file = $values['picture']['file'];

      $name = md5(microtime().'picture').$file->getExtension();

      $file->save($name);

      $is_default = (count($auction->getPictures()->toArray()) > 0) ? false : true;

      $picture = new Picture();
      $picture->setAuctionId($this->getObject()->getPrimaryKey());
      $picture->setFile($name);
      $picture->setIsDefault($is_default);
      $picture->save();

    }
    return $auction;
  }


}
