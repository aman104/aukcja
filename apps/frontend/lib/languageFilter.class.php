<?php

class languageFilter extends sfFilter
{
  public function execute ($filterChain)
  { 
  	$user = $this->getContext()->getUser();
  	if(!$user->getAttribute('set_language', false)) 
  	{
  		$this->getContext()->getUser()->setCulture('pl');	
  	}
  	
    
    // execute next filter
    $filterChain->execute();
  }
}