<?php


//HOW TO RUN!!!!
//./symfony auction:end-auction --domain="aukcje.sf.pl"

class endauctionsTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'frontend'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      new sfCommandOption('domain', null, sfCommandOption::PARAMETER_REQUIRED),
      // add your own options here
    ));

    $this->namespace        = 'auction';
    $this->name             = 'end-auctions';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [end-auctions|INFO] task does things.
Call it with:

  [php symfony end-auctions|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    // add your code here

    $routing = $this->getRouting();
    


    $auctions = AuctionTable::getInstance()->getAuctionsToEnd();
    foreach($auctions as $auction)
    {
      $url = $routing->generate('auction', $auction);
      $params = array();
      $params['url'] = 'http://'.$options['domain'].$url;
      $auction->setToEnd($params);
    }

  }
}
