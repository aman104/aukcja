<?php

class FrontendRegisterForm extends sfGuardRegisterForm
{
	public function configure()
	{

		$c = new sfCultureInfo('en');
    	$countries = $c->getCountries();
    	$countries = array_combine(array_values($countries), array_values($countries));

		$required = ' *';

		$this->widgetSchema['first_name']->setLabel('Imię'.$required);
		$this->widgetSchema['last_name']->setLabel('Nazwisko'.$required);
		$this->widgetSchema['email_address']->setLabel('E-mail'.$required);
		$this->widgetSchema['username']->setLabel('Login'.$required);
		$this->widgetSchema['password']->setLabel('Hasło'.$required);
		$this->widgetSchema['password_again']->setLabel('Powtórz hasło'.$required);

		$this->widgetSchema['street'] = new sfWidgetFormInput();
		$this->validatorSchema['street'] = new sfValidatorString(array('required' => true));
		$this->widgetSchema['street']->setLabel('Ulica + nr domu'.$required);

		$this->widgetSchema['post_code'] = new sfWidgetFormInput();
		$this->validatorSchema['post_code'] = new sfValidatorString(array('required' => true));
		$this->widgetSchema['post_code']->setLabel('Kod pocztowy'.$required);

		$this->widgetSchema['city'] = new sfWidgetFormInput();
		$this->validatorSchema['city'] = new sfValidatorString(array('required' => true));
		$this->widgetSchema['city']->setLabel('Miasto'.$required);		

		$this->widgetSchema['country'] = new sfWidgetFormSelect(array('choices' => $countries));
		$this->validatorSchema['country'] = new sfValidatorString(array('required' => true));
		$this->widgetSchema['country']->setLabel('Kraj'.$required);

		$this->widgetSchema['phone'] = new sfWidgetFormInput();
		$this->validatorSchema['phone'] = new sfValidatorString(array('required' => false));
		$this->widgetSchema['phone']->setLabel('Telefon');

		$this->widgetSchema['mobile'] = new sfWidgetFormInput();
		$this->validatorSchema['mobile'] = new sfValidatorString(array('required' => false));
		$this->widgetSchema['mobile']->setLabel('Tel. komórkowy');

		$this->widgetSchema['skype'] = new sfWidgetFormInput();
		$this->validatorSchema['skype'] = new sfValidatorString(array('required' => false));
		$this->widgetSchema['skype']->setLabel('Skype');

		$this->widgetSchema['gg'] = new sfWidgetFormInput();
		$this->validatorSchema['gg'] = new sfValidatorString(array('required' => false));
		$this->widgetSchema['gg']->setLabel('Nr GG');

		$this->widgetSchema['captcha'] = new sfWidgetCaptchaGD();
		$this->widgetSchema['captcha']->setLabel('Przepisz obrazek');
		$this->validatorSchema['captcha'] = new sfCaptchaGDValidator(array('length' => 4));

	}

	public function save($con = null)
	{
		$guardUser = parent::save();

		$guardUser->setIsActive(false);
		$guardUser->save();

		$values = $this->getValues();

		$profile = new Profile();
		$profile->setSfGuardUserId($guardUser->getPrimaryKey());
		$profile->setUid(Tools::getUid());
		$profile->setPhone($values['phone']);
		$profile->setMobile($values['mobile']);
		$profile->setStreet($values['street']);
		$profile->setPostCode($values['post_code']);
		$profile->setCity($values['city']);
		$profile->setCountry($values['country']);
		$profile->setSkype($values['skype']);
		$profile->setGg($values['gg']);
		$profile->save();

		$to = $guardUser->getEmailAddress();

		switch($profile->getCountry())
		{			
			case 'Poland' : 
				$title = 'Zarejestrowałeś konto w serwisie';
				$content = 'Administrator kipa.be skontaktuje się z Panem/Panią w ciągu 24h w celu weryfikacji danych osobowych. W celu przyśpieszenia aktywacji konta można skontaktować się z administratorem pod numerem telefonu 0049 1511 290 1511 lub e-mail: przemek@kulbacki.de.';
				break;
			case 'China' :
				$title = '激活帐户';
				$content = '管理員kipa.be接觸的先生/小姐在24小時內確認您的個人信息。為了加快激活您的帳戶，您就可以與管理員聯繫，電話：004915112901511或e-mail：przemek@kulbacki.de';
				break;
			default: 
				$title = 'Activate account';
				$content = 'Admin kipa.be contact Mr / Ms within 24 hours to verify your personal information. In order to accelerate the activation of your account, you can contact the administrator by calling 0049 1511 290 1511 or e-mail: przemek@kulbacki.de';
		}

		
		Tools::sendEmail($to, $title, $content);


		$admin = sfGuardUserTable::getInstance()->findOneByUsername('admin');
		$content = 'Login: '.$guardUser->getUsername();
		$content .= '<br />E-mail: '.$guardUser->getEmailAddress();
		Tools::sendEmail($admin->getEmailAddress(), 'Nowe konto w systemie', $content);

		return $guardUser;

		
	}
}