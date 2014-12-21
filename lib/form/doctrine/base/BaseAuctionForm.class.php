<?php

/**
 * Auction form base class.
 *
 * @method Auction getObject() Returns the current form's model object
 *
 * @package    aukcje
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAuctionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'sex'        => new sfWidgetFormInputText(),
      'breeder'    => new sfWidgetFormInputText(),
      'movie'      => new sfWidgetFormInputText(),
      'price'      => new sfWidgetFormInputText(),
      'price_max'  => new sfWidgetFormInputText(),
      'expired_at' => new sfWidgetFormDateTime(),
      'start_date' => new sfWidgetFormDateTime(),
      'is_end'     => new sfWidgetFormInputCheckbox(),
      'is_active'  => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sex'        => new sfValidatorString(array('max_length' => 255)),
      'breeder'    => new sfValidatorString(array('max_length' => 255)),
      'movie'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'price'      => new sfValidatorInteger(array('required' => false)),
      'price_max'  => new sfValidatorInteger(array('required' => false)),
      'expired_at' => new sfValidatorDateTime(),
      'start_date' => new sfValidatorDateTime(),
      'is_end'     => new sfValidatorBoolean(array('required' => false)),
      'is_active'  => new sfValidatorBoolean(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('auction[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Auction';
  }

}
