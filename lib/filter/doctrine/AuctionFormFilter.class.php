<?php

/**
 * Auction filter form.
 *
 * @package    aukcje
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AuctionFormFilter extends BaseAuctionFormFilter
{
  public function configure()
  {
  	unset($this['sex']);
  	
  	unset($this['movie']);
  	unset($this['description']);
  	unset($this['price']);
  	unset($this['price_max']);
  	unset($this['created_at']);
  	unset($this['updated_at']);
  	unset($this['slug']);
  	unset($this['is_end']);
  	unset($this['expired_at']);
    unset($this['start_date']);
  }
}
