<?php

class LicitationForm extends sfForm
{

	private $auction = false;
	private $message = "";

	public function setAuction($auction)
	{
		$this->auction = $auction;
	}

	public function getAuction()
	{
		return $this->auction;
	}

	private function setMessage($text)
	{
		$this->message = $text;
	}

	public function getMessage()
	{
		return $this->message;
	}

	public function configure()
	{
		$this->disableCSRFProtection();
		$this->widgetSchema['price'] = new sfWidgetFormInput();
		$this->validatorSchema['price'] = new sfValidatorInteger(array('required' => true));
		$this->widgetSchema['buying_order'] = new sfWidgetFormInputHidden();
		$this->validatorSchema['buying_order'] = new sfValidatorInteger(array('required' => true));
		$this->widgetSchema['change'] = new sfWidgetFormInputHidden();
		$this->validatorSchema['change'] = new sfValidatorInteger(array('required' => false));
	}

	public function save($con = null)
	{
		$values = $this->getValues();
		$user = sfContext::getInstance()->getUser()->getGuardUser();
		$auction = $this->getAuction();

		if(isset($values['change']) && $values['change'] == 1)
		{
			$result = $auction->changeBuyingOrder($values['price']);
			if($result)
			{
				$this->setMessage("Zalicytowałeś aukcje");
			}
			return true;
		}
		
		if($values['price'] >= $auction->getNextPrice())
		{
			if($values['price'] > $auction->getPriceMax() || $auction->isNewAuction())
			{
				$this->setMessage("Zalicytowałeś aukcje");
				$auction->addHistory($user, $values['price'], $values['buying_order']);
				return true;
			}
			else
			{
				$auction->addHistory($user, $values['price'], $values['buying_order']);
				$this->setMessage("Twoja oferta została automatycznie przebita");
				return true;		
			}
		}
		else
		{
			$this->setMessage("Podałeś za niską cenę");
			return true;
		}

	}

}
