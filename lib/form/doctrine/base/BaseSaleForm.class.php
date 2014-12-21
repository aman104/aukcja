<?php

/**
 * Sale form base class.
 *
 * @method Sale getObject() Returns the current form's model object
 *
 * @package    aukcje
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSaleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'price'      => new sfWidgetFormInputText(),
      'is_active'  => new sfWidgetFormInputCheckbox(),
      'mother'     => new sfWidgetFormInputText(),
      'father'     => new sfWidgetFormInputText(),
      'breeder'    => new sfWidgetFormInputText(),
      'owner'      => new sfWidgetFormInputText(),
      'movie'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'price'      => new sfValidatorInteger(array('required' => false)),
      'is_active'  => new sfValidatorBoolean(array('required' => false)),
      'mother'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'father'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'breeder'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'owner'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'movie'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('sale[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sale';
  }

}
