<?php

class EditProfileForm extends ProfileForm
{
	public function configure()
	{

		$c = new sfCultureInfo('en');
    	$countries = $c->getCountries();
    	$countries = array_combine(array_values($countries), array_values($countries));

		unset($this['is_deleted']);
		$user = $this->getObject()->getSfGuardUser();

		$this->widgetSchema['first_name'] = new sfWidgetFormInput(array(), array('disabled' => 'true'));
		$this->widgetSchema['first_name']->setLabel('Imię');
		$this->widgetSchema['first_name']->setDefault($user->getFirstName());
		$this->validatorSchema['first_name'] = new sfValidatorString(array('required' => true));


		$this->widgetSchema['last_name'] = new sfWidgetFormInput(array(), array('disabled' => 'true'));
		$this->widgetSchema['last_name']->setLabel('Nazwisko');
		$this->widgetSchema['last_name']->setDefault($user->getLastName());
		$this->validatorSchema['last_name'] = new sfValidatorString(array('required' => true));

		$this->widgetSchema['email_address'] = new sfWidgetFormInput(array(), array('disabled' => 'true'));
		$this->widgetSchema['email_address']->setLabel('E-mail');
		$this->widgetSchema['email_address']->setDefault($user->getEmailAddress());
		$this->validatorSchema['email_address'] = new sfValidatorEmail(array('required' => true));
	
		$this->widgetSchema['country'] = new sfWidgetFormSelect(array('choices' => $countries), array('disabled' => 'true'));

		$this->widgetSchema['phone'] = new sfWidgetFormInput(array(), array('disabled' => 'true'));
		$this->widgetSchema['mobile'] = new sfWidgetFormInput(array(), array('disabled' => 'true'));
		$this->widgetSchema['street'] = new sfWidgetFormInput(array(), array('disabled' => 'true'));
		$this->widgetSchema['post_code'] = new sfWidgetFormInput(array(), array('disabled' => 'true'));
		$this->widgetSchema['city'] = new sfWidgetFormInput(array(), array('disabled' => 'true'));
		$this->widgetSchema['phone'] = new sfWidgetFormInput(array(), array('disabled' => 'true'));
		$this->widgetSchema['skype'] = new sfWidgetFormInput(array(), array('disabled' => 'true'));
		$this->widgetSchema['gg'] = new sfWidgetFormInput(array(), array('disabled' => 'true'));

		parent::configure();	
	}

	public function save($con = null)
	{
		$values = $this->getValues();

		$user = $this->getObject()->getSfGuardUser();
		$user->setFirstName($values['first_name']);
		$user->setLastName($values['last_name']);
		$user->setEmailAddress($values['email_address']);
		$user->save();

		return parent::save();


	}
}