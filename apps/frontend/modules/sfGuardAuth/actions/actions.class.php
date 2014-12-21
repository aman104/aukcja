<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once(dirname(__FILE__).'/../lib/BasesfGuardAuthActions.class.php');

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 23319 2009-10-25 12:22:23Z Kris.Wallsmith $
 */
class sfGuardAuthActions extends BasesfGuardAuthActions
{
	public function executeRegister(sfWebRequest $request)
	{
		$this->form = new FrontendRegisterForm();
		if($request->isMethod('post'))
		{
			$this->form->bind($request->getParameter('sf_guard_user'));
			if($this->form->isValid())
			{
				$this->form->save();
				$this->getUser()->setFlash('notice', 'Twoje konto zostało założone, odbierz pocztę.');
				$this->redirect('@login');
			}
		}
	}

	public function executeActivate(sfWebRequest $request)
	{
		$object = $this->getRoute()->getObject();
		$guardUser = $object->getSfGuardUser();
		if(!$guardUser->getIsActive())
		{
			$guardUser->setIsActive(true);
			$guardUser->save();
			$this->getUser()->signin($guardUser);
			$this->getUser()->setFlash('notice', 'Twoje konto zostało aktywowane');
			$this->redirect('@homepage');
		}
		else
		{
			$this->forward404();
		}
	}
}
