<?php

/**
 * sfGuardUserAdminForm for admin generators
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserAdminForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardUserAdminForm extends BasesfGuardUserAdminForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
  	unset($this['is_super_admin']);
  	unset($this['groups_list']);
  	unset($this['permissions_list']);
  	
  	

  	$profile = $this->object->getProfile();  	
  	$this->embedForm('Profile', new ProfileForm($profile));
  }
}
