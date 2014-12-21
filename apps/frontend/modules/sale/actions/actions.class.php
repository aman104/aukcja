<?php

/**
 * sale actions.
 *
 * @package    aukcje
 * @subpackage sale
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class saleActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {

  	$this->pager = new sfDoctrinePager('Auctions', 30);

  	$query = SaleTable::getInstance()->getActiveQuery();
  	$this->pager->setQuery($query);
  	$this->pager->setPage($request->getParameter('page', 1));
  	$this->pager->init();
  }

  public function executeArchive(sfWebRequest $request)
  {

    $this->pager = new sfDoctrinePager('Auctions', 30);

    $query = SaleTable::getInstance()->getArchiveQuery();
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  public function executeSale(sfWebRequest $request)
  {
    $this->sale = $this->getRoute()->getObject();

    $this->form = new SaleBuyForm();
    $this->form->setSale($this->sale);
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
