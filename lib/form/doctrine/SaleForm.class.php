<?php

/**
 * Sale form.
 *
 * @package    aukcje
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SaleForm extends BaseSaleForm
{
  public function configure()
  {
  	unset($this['created_at']);
  	unset($this['updated_at']);

  	$this->embedI18n(array('pl', 'en', 'cn'));

  	$pictureForm = new SalePictureBackendForm();

    $this->embedForm('picture', $pictureForm);
    $this->widgetSchema['picture']->setLabel('Dodaj obrazek');

  }

  public function save($con = null)
  {
    $values = $this->getValues();

    $sale = parent::save($con);

    if(count($values['picture']['file']) > 0)
    {
      $file = $values['picture']['file'];

      $name = md5(microtime().'picture').$file->getExtension();

      $file->save($name);

      $is_default = (count($sale->getPictures()->toArray()) > 0) ? false : true;

      $picture = new SalePicture();
      $picture->setSaleId($this->getObject()->getPrimaryKey());
      $picture->setFile($name);
      $picture->setIsDefault($is_default);
      $picture->save();

    }
    return $sale;
  }
}
