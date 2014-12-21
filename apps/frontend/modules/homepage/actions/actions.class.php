<?php

/**
 * homepage actions.
 *
 * @package    aukcje
 * @subpackage homepage
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homepageActions extends sfActions
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

  public function executeRegulamin(sfWebRequest $request)
  {
    
  }

  public function executeLanguage(sfWebRequest $request)
  {
    $langs = array('pl', 'en', 'cn');

    $lang = $request->getGetParameter('lang');
      
    if(in_array($lang, $langs))
    {

      $this->getUser()->setAttribute('set_language', true);
      $this->getUser()->setCulture($lang);   

    }

    $this->redirect('homepage');

  }

  public function executeContact(sfWebRequest $request)
  {
      
  }

}
