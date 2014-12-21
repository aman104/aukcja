<?php

/**
 * Profile form base class.
 *
 * @method Profile getObject() Returns the current form's model object
 *
 * @package    aukcje
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'uid'              => new sfWidgetFormInputText(),
      'phone'            => new sfWidgetFormInputText(),
      'mobile'           => new sfWidgetFormInputText(),
      'street'           => new sfWidgetFormInputText(),
      'post_code'        => new sfWidgetFormInputText(),
      'city'             => new sfWidgetFormInputText(),
      'country'          => new sfWidgetFormInputText(),
      'skype'            => new sfWidgetFormInputText(),
      'gg'               => new sfWidgetFormInputText(),
      'is_deleted'       => new sfWidgetFormInputCheckbox(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'uid'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mobile'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'street'           => new sfValidatorString(array('max_length' => 255)),
      'post_code'        => new sfValidatorString(array('max_length' => 255)),
      'city'             => new sfValidatorString(array('max_length' => 255)),
      'country'          => new sfValidatorString(array('max_length' => 255)),
      'skype'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'gg'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_deleted'       => new sfValidatorBoolean(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Profile', 'column' => array('uid')))
    );

    $this->widgetSchema->setNameFormat('profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

}
