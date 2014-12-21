<?php

class SaleBuyForm extends sfForm {

	private $sale = false;

	public function setSale($sale)
	{
		$this->sale = $sale;
	}

	public function getSale()
	{
		return $this->sale;
	}

	public function configure()
	{

		$required = ' *';

		$c = new sfCultureInfo('en');
    	$countries = $c->getCountries();
    	$countries = array_combine(array_values($countries), array_values($countries));

		$this->widgetSchema['first_name'] = new sfWidgetFormInput();
		$this->validatorSchema['first_name'] = new sfValidatorString(array('required' => true));


		$this->widgetSchema['last_name'] = new sfWidgetFormInput();
		$this->validatorSchema['last_name'] = new sfValidatorString(array('required' => true));

		$this->widgetSchema['email'] = new sfWidgetFormInput();
		$this->validatorSchema['email'] = new sfValidatorEmail(array('required' => true));
	
		$this->widgetSchema['country'] = new sfWidgetFormSelect(array('choices' => $countries));
		$this->validatorSchema['country'] = new sfValidatorString(array('required' => true));
		$this->widgetSchema['phone'] = new sfWidgetFormInput();
		$this->validatorSchema['phone'] = new sfValidatorString(array('required' => true));
		$this->widgetSchema['street'] = new sfWidgetFormInput();
		$this->validatorSchema['street'] = new sfValidatorString(array('required' => true));
		$this->widgetSchema['post_code'] = new sfWidgetFormInput();
		$this->validatorSchema['post_code'] = new sfValidatorString(array('required' => true));
		$this->widgetSchema['city'] = new sfWidgetFormInput();
		$this->validatorSchema['city'] = new sfValidatorString(array('required' => true));

		$this->widgetSchema['first_name']->setLabel('Imię'.$required);
		$this->widgetSchema['last_name']->setLabel('Nazwisko'.$required);
		$this->widgetSchema['email']->setLabel('E-mail'.$required);
		$this->widgetSchema['street']->setLabel('Ulica + nr domu'.$required);
		$this->widgetSchema['post_code']->setLabel('Kod pocztowy'.$required);
		$this->widgetSchema['city']->setLabel('Miasto'.$required);	
		$this->widgetSchema['country']->setLabel('Kraj'.$required);
		$this->widgetSchema['phone']->setLabel('Telefon');
	}

	public function save()
	{
		$values = $this->getValues();
		$content = 'Przedmiot: '.$this->getSale()->getName().' '.$this->getSale()->getPrice().' EUR <br />'.Tools::abs_url_for('sale_one', $this->getSale()).'<br /><br />';
		$content .= $values['first_name'].'<br />';
		$content .= $values['last_name'].'<br />';
		$content .= $values['email'].'<br />';
		$content .= $values['country'].'<br />';
		$content .= $values['phone'].'<br />';
		$content .= $values['street'].'<br />';
		$content .= $values['post_code'].'<br />';
		$content .= $values['city'].'<br />';
		$to = 'przemek@kulbacki.de';
		Tools::sendEmail($to, 'Nowa sprzedaż z aukcja.kipa.be', $content, $values['email']);
	}

}