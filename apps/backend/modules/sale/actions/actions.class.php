<?php

require_once dirname(__FILE__).'/../lib/saleGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/saleGeneratorHelper.class.php';

/**
 * sale actions.
 *
 * @package    aukcje
 * @subpackage sale
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class saleActions extends autoSaleActions
{

  public function executeDeletePicture(sfWebRequest $request)
  {
    $this->getRoute()->getObject()->delete();
    $this->getUser()->setFlash('notice', 'Obrazek został usunięty');
    $this->redirect($request->getReferer());
  }

  public function executeDefaultPicture(sfWebRequest $request)
  {
    $picture = $this->getRoute()->getObject();
    $picture_old = $picture->getSale()->getDefaultPicture();

    if($picture_old)
    {
      $picture_old->setIsDefault(false);
      $picture_old->save();
    }

    $picture->setIsDefault(true);
    $picture->save();

    $this->getUser()->setFlash('notice', 'Obrazek został ustawiony jako domyślny');
    $this->redirect($request->getReferer());
  } 

  public function executeSetPrev(sfWebRequest $request)
  {
    $picture = $this->getRoute()->getObject();
    $picture->setPrev();
    $this->getUser()->setFlash('notice', 'Obrazek został z0mienony');
    $this->redirect($request->getReferer());
  }

  public function executeSetNext(sfWebRequest $request)
  {
    $picture = $this->getRoute()->getObject();
    $picture->setNext();
    $this->getUser()->setFlash('notice', 'Obrazek został zmienony');
    $this->redirect($request->getReferer());
  }
}
