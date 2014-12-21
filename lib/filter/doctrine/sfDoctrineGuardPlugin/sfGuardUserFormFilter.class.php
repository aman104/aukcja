<?php

/**
 * sfGuardUser filter form.
 *
 * @package    aukcje
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserFormFilter extends PluginsfGuardUserFormFilter
{
  public function configure()
  {
  	unset($this['algorithm']);
  	unset($this['salt']);
  	unset($this['password']);
  	unset($this['is_super_admin']);
  	unset($this['last_login']);
  	unset($this['created_at']);
  	unset($this['updated_at']);
  	unset($this['groups_list']);
  	unset($this['permissions_list']);

  	$this->widgetSchema['is_deleted'] = new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no')));
  	$this->widgetSchema['is_deleted']->setDefault(0);
  	$this->validatorSchema['is_deleted'] = new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0)));

  }

  public function addIsDeletedColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }
   
    $query->andWhere('p.is_deleted =?', $values[0]);

  }
}
