<?php

/**
 * AuctionHistory form base class.
 *
 * @method AuctionHistory getObject() Returns the current form's model object
 *
 * @package    aukcje
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAuctionHistoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'profile_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'), 'add_empty' => false)),
      'auction_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Auction'), 'add_empty' => false)),
      'price_actual' => new sfWidgetFormInputText(),
      'price_max'    => new sfWidgetFormInputText(),
      'is_winner'    => new sfWidgetFormInputCheckbox(),
      'buying_order' => new sfWidgetFormInputCheckbox(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'profile_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'))),
      'auction_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Auction'))),
      'price_actual' => new sfValidatorInteger(),
      'price_max'    => new sfValidatorInteger(),
      'is_winner'    => new sfValidatorBoolean(array('required' => false)),
      'buying_order' => new sfValidatorBoolean(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('auction_history[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AuctionHistory';
  }

}
