<?php

/**
 * SaleTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class SaleTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object SaleTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Sale');
    }

    public function getActiveQuery()
    {
    	$q = $this->createQuery('s');
    	$q->where('s.is_active =?',true);
    	$q->orderBy('s.created_at desc');
    	return $q;
    }

    public function getArchiveQuery()
    {
        $q = $this->createQuery('s');
        $q->where('s.is_active =?',false);
        $q->orderBy('s.created_at desc');
        return $q;
    }

}