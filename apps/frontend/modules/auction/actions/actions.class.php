<?php

/**
 * auction actions.
 *
 * @package    aukcje
 * @subpackage auction
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class auctionActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

  	$this->pager = new sfDoctrinePager('Auctions', 30);

  	$query = AuctionTable::getInstance()->getAllAuctionQuery();
  	$this->pager->setQuery($query);
  	$this->pager->setPage($request->getParameter('page', 1));
	  $this->pager->init(); 
  }

  public function executeArchive(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('Auctions', 30);

    $query = AuctionTable::getInstance()->getArchiveQuery();
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init(); 
  }

  public function executeAuction(sfWebRequest $request)
  {
  	$this->object = $this->getRoute()->getObject();

    if( ! $this->object->getIsActive() || $this->object->getStartDate() > date('Y-m-d H:i:s', time()))
    {
      $this->forward404();
    }

    $this->form = new LicitationForm();
    $this->form->setAuction($this->object);
    if($request->isMethod('post'))
    {
      if($this->getUser()->isAuthenticated())
      {  
        $values = $request->getParameter('auction');

        $this->form->bind($values);
        if($this->form->isValid() && ! $this->object->isEnd())
        {
          $result = $this->form->save();
          $message = $this->form->getMessage();
          if($result)
          {
            $this->getUser()->setFlash('notice', $message, true);     
          }
          else
          {
            $this->getUser()->setFlash('error', $message, true);     
          }
        }
        else
        {
           $this->getUser()->setFlash('error', 'Nie możesz licytować aukcji', true);
        }
      }
      else
      {
        $this->getUser()->setFlash('error', 'Musisz być zalogowany by móc licytować aukcje', true);
      }
      $this->redirect('auction', $this->object);
    }

  }

  public function executeGalleries(sfWebRequest $request)
  {

    $this->auctions = AuctionTable::getInstance()->getAllAuctionQuery()->execute();
    $this->sales = SaleTable::getInstance()->getActiveQuery()->execute();

  }

  public function executeCheck(sfWebRequest $request)
  {
    $auctions = json_decode(file_get_contents('php://input'), true);
    $array = array();
    foreach($auctions['auctions'] as $one)
    {
      $array[$one['auction_id']]['history_id'] = $one['history_id'];
      $array[$one['auction_id']]['time'] = (bool)$one['time'];
    }

    $ids = array_keys($array);

    $objects = AuctionTable::getInstance()->findAuctionsByIds($ids);
    $return = array();
    foreach($objects as $object)
    {
      if($object->getHistoryWinner())
      {
        if($object->getHistoryWinner()->getPrimaryKey() != $array[$object->getPrimaryKey()]['history_id'] || ($object->isLastMinutes(30) && ! $array[$object->getPrimaryKey()]['time']))
        {
          $return[] = $object->getPrimaryKey();
        }  
      }
      
    }

    $time = time();
    $return = array('time' => $time, 'auction' => $return);

    echo json_encode($return);

    $this->setLayout(false);
    exit;
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->object = $this->getRoute()->getObject();
    $this->slim = true;
    $this->setLayout(false);
  }

  public function executeUpdateLast(sfWebRequest $request)
  {
    $this->auctions = AuctionTable::getInstance()->getLastLicitationAuctions(10);
    $this->setLayout(false);
  }

    
  public function executeOverview(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('Auctions', 30);

    $query = AuctionTable::getInstance()->getAllAuctionQuery();
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init(); 
  }

}
