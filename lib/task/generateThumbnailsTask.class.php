<?php

class generateThumbnailsTask extends sfBaseTask
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

    $this->namespace        = 'aukcje';
    $this->name             = 'generateThumbnails';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [generateThumbnails|INFO] task does things.
Call it with:

  [php symfony generateThumbnails|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $pictures = PictureTable::getInstance()->findAll();

    $this->logSection('All', count($pictures));
    $i = 1;
    foreach($pictures as $picture)
    {
      $this->logSection('Now', $i++);
      $picture->save();
      unset($picture);
    }

    // add your code here
  }
}
