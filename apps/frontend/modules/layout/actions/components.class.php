<?php

/**
 * layout components
 *
 * @package    cms
 * @subpackage layout
 * @author     Paweł Sałajczyk
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class layoutComponents extends sfComponents
{
	public function executeTopMenu(sfWebRequest $request)
	{
		$action = sfContext::getInstance()->getActionName();
		$module = sfContext::getInstance()->getModuleName();

		if($module == 'sfGuardAuth')
		{
			if($action == 'signin')
			{
				$this->active = 'login';
			}
			if($action == 'register')
			{
				$this->active = 'register';
			}
		}
		elseif($module == 'auction')
		{
			if($action == 'index' || $action == 'auction')
			{
				$this->active = 'auction';
			}
			elseif($action == 'galleries')
			{
				$this->active = 'galleries';
			}
			elseif($action == 'archive')
			{
				$this->active = 'archive';
			}		
		}
		elseif($module == 'profile')
		{
			if($action == 'profile')
			{
				$this->active = 'profile';
			}
			elseif($action == 'auction')
			{
				$this->active = 'profile-auction';
			}
		}
		elseif($module == 'sale' && $action != 'archive')
		{
			$this->active = 'sale';
		}
		elseif($module == 'sale' && $action == 'archive')
		{
			$this->active = 'archive-sale';	
		}
		elseif($module == 'homepage' && $action == 'regulamin')
		{
			$this->active = 'regulamin';
		}


		if(!$this->active)
		{
			$this->active = 'home';
		}

	}

	public function executeBreadcrumbs(sfWebRequest $request)
	{
		
	}

	public function executeFlash(sfWebRequest $request)
	{

	}

	public function executeColLeft(sfWebRequest $request)
	{
		$this->auctions = AuctionTable::getInstance()->getLastLicitationAuctions(10);
	}

	public function executeFooter(sfWebRequest $request)
	{

	}

	public function executeContact(sfWebRequest $request)
	{
	  $this->form = new ContacfForm();
      if($request->isMethod('post'))
      {
        $this->form->bind($request->getPostParameters());
        if($this->form->isValid())
        {
          $this->form->save();
          $this->getUser()->setFlash('notice', 'Wiadomość została wysłana', true);

        }
        else
        {
          $this->getUser()->setFlash('error', 'Wypełnij wszystkie wymagane pola');
        }
      }
	}
}