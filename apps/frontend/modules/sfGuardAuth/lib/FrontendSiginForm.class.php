<?php

class FrontendSiginForm extends sfGuardFormSignin
{
	public function configure()
	{
		unset($this['remember']);
		$this->widgetSchema['username']->setLabel('Login');
		$this->widgetSchema['password']->setLabel('Hasło');		
	}
}