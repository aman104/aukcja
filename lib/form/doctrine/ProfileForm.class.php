<?php

/**
 * Profile form.
 *
 * @package    aukcje
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileForm extends BaseProfileForm
{
  public function configure()
  {
  	unset($this['sf_guard_user_id']);
  	unset($this['uid']);
  	unset($this['created_at']);
  	unset($this['updated_at']);
    unset($this['is_deleted']);

  	$this->widgetSchema['street']->setLabel('Ulica + nr domu');
  	$this->widgetSchema['post_code']->setLabel('Kod pocztowy');
  	$this->widgetSchema['city']->setLabel('Miasto');		
  	$this->widgetSchema['country']->setLabel('Kraj');
  	$this->widgetSchema['phone']->setLabel('Telefon');
	  $this->widgetSchema['mobile']->setLabel('Tel. komórkowy');
	  $this->widgetSchema['skype']->setLabel('Skype');
	  $this->widgetSchema['gg']->setLabel('Nr GG');

  }
}
