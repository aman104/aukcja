<?php

/**
 * SalePicture form base class.
 *
 * @method SalePicture getObject() Returns the current form's model object
 *
 * @package    aukcje
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSalePictureForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'sale_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Sale'), 'add_empty' => false)),
      'file'       => new sfWidgetFormInputText(),
      'is_default' => new sfWidgetFormInputCheckbox(),
      'position'   => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sale_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Sale'))),
      'file'       => new sfValidatorString(array('max_length' => 255)),
      'is_default' => new sfValidatorBoolean(array('required' => false)),
      'position'   => new sfValidatorInteger(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('sale_picture[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SalePicture';
  }

}
