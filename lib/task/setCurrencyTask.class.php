<?php

class setCurrencyTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'auction';
    $this->name             = 'setCurrency';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [setCurrency|INFO] task does things.
Call it with:

  [php symfony setCurrency|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    try 
    {
      $kursy = new NBP('http://nbp.pl/kursy/xml/LastA.xml', 'kursy_cache.txt', '12:16 -1 day', '12:16');
      $waluta = $kursy->znajdz(array('kurs_sredni'));
      
      $val = $waluta['EUR']['kurs_sredni'];
      $val = str_replace(',', '.', $val);
      $val = str_replace(' ', '', $val);

      if((int)$val > 0)
      {
        $eur = AuctionConfigTable::getInstance()->findOneByName('EUR');
        $eur->setValue($val);
        $eur->save();
      } 
    }
    catch(Exception $e) {
      echo 'Błąd przy wyświetlaniu kursów walut.';
    }

    // add your code here
  }
}
