<?php

require_once dirname(__FILE__).'/../lib/auctionGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/auctionGeneratorHelper.class.php';

/**
 * auction actions.
 *
 * @package    aukcje
 * @subpackage auction
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class auctionActions extends autoAuctionActions
{

  public function executeIndex(sfWebRequest $request)
  {

  	if(in_array($request->getParameter('is_end'), array('true', 'false')))
  	{
  		$this->getUser()->setAttribute('is_end', $request->getParameter('is_end'));
  	}
  	elseif(in_array($this->getUser()->getAttribute('is_end', -1), array('true', 'false')))
  	{
  		$this->getUser()->setAttribute('is_end', $this->getUser()->getAttribute('is_end'));	
  	}
  	else
  	{
  		$this->getUser()->setAttribute('is_end', 'false');	
  	}

    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }

  protected function getPager()
  {

  	$is_end = $this->getUser()->getAttribute('is_end', 'false');	

  	$q = $this->buildQuery();

  	if($is_end == 'true')
  	{
  		$q->andWhere('(is_end = true OR expired_at < "'.date('Y-m-d H:i:s', time()).'")');
  	}
  	else
  	{
  		$q->andWhere('(expired_at >= "'.date('Y-m-d H:i:s', time()).'")');	
  	}

    $pager = $this->configuration->getPager('Auction');
    $pager->setQuery($q);
    $pager->setPage($this->getPage());
    $pager->init();

    return $pager;
  }

  public function executeDeletePicture(sfWebRequest $request)
  {
    $this->getRoute()->getObject()->delete();
    $this->getUser()->setFlash('notice', 'Obrazek został usunięty');
    $this->redirect($request->getReferer());
  }

  

  public function executeDefaultPicture(sfWebRequest $request)
  {
    $picture = $this->getRoute()->getObject();
    $picture_old = $picture->getAuction()->getDefaultPicture();

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

  public function executeListCopy(sfWebRequest $request)
  {
    $auction = $this->getRoute()->getObject();
    $auctionNew = $auction->copy();
    $auctionNew->setPrice(50);
    $auctionNew->setPriceMax(50);
    $auctionNew->setIsEnd(false);
    
    $langs = array('en', 'pl', 'cn');

    

    foreach($langs as $lang)
    {
      $auctionNew->Translation[$lang]['name'] = $auction->Translation[$lang]['name'];
      $auctionNew->Translation[$lang]['description'] = $auction->Translation[$lang]['description'];
    }

    $auctionNew->setIsActive(false);
    $auctionNew->save();

    $pictures = $auction->getPictures();
    foreach($pictures as $picture)
    {
      $file = $picture->copyFile();
      $new = new Picture();
      $new->setAuctionId($auctionNew->getPrimaryKey());
      $new->setFile($file);
      $new->setIsDefault($picture->getIsDefault());
      $new->setPosition($picture->getPosition());
      $new->save();
    }

    

    $this->redirect('auction_edit', $auctionNew);

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
