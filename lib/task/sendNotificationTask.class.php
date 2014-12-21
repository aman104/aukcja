<?php

class sendNotificationTask extends sfBaseTask
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
    $this->name             = 'sendNotification';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [sendNotification|INFO] task does things.
Call it with:

  [php symfony sendNotification|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $routing = $this->getRouting();
    $mails = array();
    $auctions = AuctionTable::getInstance()->getAuctionsEnded(24);
    foreach($auctions as $auction)
    {
      $profiles = $auction->getLicitationProfiles();
      $url = $routing->generate('auction', $auction);
      $url = 'http://'.$options['domain'].$url;
      foreach($profiles as $profile)
      {
          switch($profile->getCountry())
          {     
            case 'Poland' : 
              $title = 'Aukcja kończy się za 24 godziny';
              $content = 'Aukcja <a href="'.$url.'">'.$url.'</a> w której bierzesz udział kończy sie za 24 godziny <br /><br />';
              $content .= ' Aktualna cena: '.$auction->getPrice().' EUR';
              break;
            case 'China' :
              $title = '拍卖结束时间为24小时';
              $content = '您的出价拍卖 <a href="'.$url.'">'.$url.'</a> 在你参加24小时的两端 <br /><br />';
              $content .= ' 当前价格: '.$auction->getPrice().' EUR';
              break;
            default: 
              $title = 'Auction ends for 24 hours';
              $content = 'Auction <a href="'.$url.'">'.$url.'</a> in which you take part ends for 24 hours<br /><br />';
              $content .= ' Actual price: '.$auction->getPrice().' EUR';
          }
          
          $to = $profile->getSfGuardUser()->getEmailAddress();
      	  if( ! isset($mails[$to]))
          {
              $mails[$to] = $to;
	            Tools::sendEmail($to, $title, $content);
	        }
      }
      
    }

    // add your code here
  }
}
