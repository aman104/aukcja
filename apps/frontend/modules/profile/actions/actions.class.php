<?php

/**
 * profile actions.
 *
 * @package    aukcje
 * @subpackage profile
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeProfile(sfWebRequest $request)
  {
      $this->form1 = new sfGuardChangeUserPasswordForm($this->getUser()->getGuardUser());

      if($request->isMethod('post') && $request->getParameter('sf_guard_user'))
      {
        $values = $request->getParameter('sf_guard_user');
        $this->form1->bind($values);
        if($this->form1->isValid())
        {
          $this->form1->save();          
          $this->getUser()->setFlash('notice', 'Hasło zostało zmienione', true);               
        }
        else
        {
          $this->getUser()->setFlash('error', 'Popraw błędy', true);               
        }
      }

      $profile = $this->getUser()->getGuardUser()->getProfile();
      $this->form2 = new EditProfileForm($profile);

      if($request->isMethod('post') && $request->getParameter('profile'))
      {
        $values = $request->getParameter('profile');
        $this->form2->bind($values);
        if($this->form2->isValid())
        {
          $this->form2->save();          
          $this->getUser()->setFlash('notice', 'Profil został zmieniony', true);               
        }
        else
        {
          $this->getUser()->setFlash('error', 'Popraw błędy', true);               
        }
      }

  }

  public function executeAuction(sfWebRequest $request)
  {
      $profile = $this->getUser()->getGuardUser()->getProfile();

      $this->actualAuctions = $profile->getActualAuctions();
      $this->endAuctions = $profile->getEndAuctions();

  }

}
