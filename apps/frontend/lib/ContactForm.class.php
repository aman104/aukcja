<?php

class ContacfForm extends sfForm
{

	public function configure()
	{

		$this->disableCSRFProtection();

		$this->widgetSchema['name'] = new sfWidgetFormInputText();
        $this->validatorSchema['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
        $this->widgetSchema['name']->setLabel('Imię i nazwisko');
		$this->widgetSchema['email'] = new sfWidgetFormInput();
        $this->validatorSchema['email'] = new sfValidatorEmail(array('required' => true));
        $this->widgetSchema['email']->setLabel('E-mail');
		$this->widgetSchema['text'] = new sfWidgetFormTextarea();
        $this->validatorSchema['text'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
        $this->widgetSchema['text']->setLabel('Treść zapytania');

		$this->widgetSchema['captcha'] = new sfWidgetCaptchaGD();
		$this->widgetSchema['captcha']->setLabel('Przepisz obrazek');
		$this->validatorSchema['captcha'] = new sfCaptchaGDValidator(array('length' => 4));        
	}

	public function save()
	{
		$values = $this->getValues();
		$content = $values['text'].'<br /><br />'.$values['name'].'<br />'.$values['email'];
		$to = 'przemek@kulbacki.de';
		Tools::sendEmail($to, 'Wiadomość kontaktowa z aukcja.kipa.be', $content, $values['email']);
	}

}