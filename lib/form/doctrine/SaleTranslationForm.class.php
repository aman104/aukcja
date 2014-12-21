<?php

/**
 * SaleTranslation form.
 *
 * @package    aukcje
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SaleTranslationForm extends BaseSaleTranslationForm
{
  public function configure()
  {
  	unset($this['slug']);
  	$this->widgetSchema['description'] = new sfWidgetFormTextareaTinyMCE();
  }
}
