<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version5 extends Doctrine_Migration_Base
{
    public function up()
    {
    	$nbp = new AuctionConfig();
    	$nbp->setName('EUR');
    	$nbp->setValue('4.0957');
    	$nbp->save();
    }

    public function down()
    {
    	$nbp = AuctionConfigTable::getInstance()->findOneByName('EUR');
    	if($nbp)
    	{
    		$nbp->delete();
    	}
    }
}