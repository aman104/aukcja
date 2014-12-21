<?php

/**
 * Profile filter form base class.
 *
 * @package    aukcje
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProfileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'uid'              => new sfWidgetFormFilterInput(),
      'phone'            => new sfWidgetFormFilterInput(),
      'mobile'           => new sfWidgetFormFilterInput(),
      'street'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'post_code'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'country'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'skype'            => new sfWidgetFormFilterInput(),
      'gg'               => new sfWidgetFormFilterInput(),
      'is_deleted'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'uid'              => new sfValidatorPass(array('required' => false)),
      'phone'            => new sfValidatorPass(array('required' => false)),
      'mobile'           => new sfValidatorPass(array('required' => false)),
      'street'           => new sfValidatorPass(array('required' => false)),
      'post_code'        => new sfValidatorPass(array('required' => false)),
      'city'             => new sfValidatorPass(array('required' => false)),
      'country'          => new sfValidatorPass(array('required' => false)),
      'skype'            => new sfValidatorPass(array('required' => false)),
      'gg'               => new sfValidatorPass(array('required' => false)),
      'is_deleted'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'sf_guard_user_id' => 'ForeignKey',
      'uid'              => 'Text',
      'phone'            => 'Text',
      'mobile'           => 'Text',
      'street'           => 'Text',
      'post_code'        => 'Text',
      'city'             => 'Text',
      'country'          => 'Text',
      'skype'            => 'Text',
      'gg'               => 'Text',
      'is_deleted'       => 'Boolean',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
