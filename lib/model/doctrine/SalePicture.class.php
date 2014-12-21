<?php

/**
 * SalePicture
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    aukcje
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class SalePicture extends BaseSalePicture
{
	public function save(Doctrine_Connection $conn = null)
	{
		
		if($this->isNew())
		{
			$position = SalePictureTable::getInstance()->getNextPictureBySaleId($this->getSaleId());
			$this->setPosition($position);
		}


		$picture = parent::save();



		$this->generateThumbnails();

		return $picture;
	}

	public function delete(	Doctrine_Connection $conn = null)
	{

		@unlink($this->getPath(false, true));
		@unlink($this->getPath('min', true));
		@unlink($this->getPath('max', true));

		$sale = $this->getSale();
		parent::delete();
		$pictures = $sale->getPictures();
		if(count($pictures) > 0)
		{
			$pictures[0]->setIsDefault(true);
			$pictures[0]->save();
		}

		SalePictureTable::getInstance()->setForceOrderBySaleId($sale->getPrimaryKey());

		return true;
	}

	public function generateThumbnails()
	{
		if(file_exists(sfConfig::get('sf_upload_dir').'/pictures/sale/'.$this->getFile()))
		{
			$thumbnail = new sfThumbnail(120, 90, true, false, 100, 'sfImageMagickAdapter');
			$thumbnail->loadFile($this->getPath(false, true));
			$thumbnail->save(sfConfig::get('sf_upload_dir').'/thumbnails/sale/min/'.$this->getFile()); 
			chmod(sfConfig::get('sf_upload_dir').'/thumbnails/sale/min/'.$this->getFile(), 0777);

			$thumbnail = new sfThumbnail(800, 600, true, false, 100, 'sfImageMagickAdapter');
			$thumbnail->loadFile($this->getPath(false, true));
			$thumbnail->save(sfConfig::get('sf_upload_dir').'/thumbnails/sale/max/'.$this->getFile()); 
			chmod(sfConfig::get('sf_upload_dir').'/thumbnails/sale/max/'.$this->getFile(), 0777);
		}
		
	}

	public function getPath($thumb = false, $absolute = false)
	{

		$prefix = ($absolute) ? sfConfig::get('sf_upload_dir') : '/uploads';

		if($thumb)
		{
			return $prefix.'/thumbnails/sale/'.$thumb.'/'.$this->getFile();
		}
		else
		{
			return $prefix.'/pictures/sale/'.$this->getFile();	
		}
		
	}

	public function copyFile()
	{
		$source = $this->getPath(false, true);
		$name = md5(time().'picturesale'.$this->getPrimaryKey());
		$ext = explode('.',$this->getFile());
		$name = $name.'.'.$ext[1];

		$desc = sfConfig::get('sf_upload_dir').'/pictures/sale/'.$name;

		copy($source, $desc);
		chmod($desc, 0777);

		return $name;

	}

	public function setNext()
	{
		if( ! $this->isLast())
		{
			$pos = $this->getPosition() + 1;
			$next = SalePictureTable::getInstance()->getByPositionAndSaleId($pos, $this->getSaleId());
			$next->setPosition($this->getPosition());
			$this->setPosition($pos);

			$next->save();
			$this->save();
		}
	}

	public function setPrev()
	{
		if( ! $this->isFirst())
		{
			$pos = $this->getPosition() - 1;
			$prev = SalePictureTable::getInstance()->getByPositionAndSaleId($pos, $this->getSaleId());
			$prev->setPosition($this->getPosition());
			$this->setPosition($pos);

			$prev->save();
			$this->save();
		}
	}

	public function isFirst()
	{
		$id = $this->getSaleId();
		$q = Doctrine_Query::create()
			->select('position')
			->from('SalePicture')
			->addWhere('sale_id = ?', $id)
			->orderBy('position asc')
			->limit(1);
		$position = $q->fetchArray();
		return ($position[0]['position'] == $this->getPosition());
	}

	public function isLast()
	{
		$id = $this->getSaleId();
		$q = Doctrine_Query::create()
			->select('position')
			->from('SalePicture')
			->addWhere('sale_id = ?', $id)
			->orderBy('position desc')
			->limit(1);
		$position = $q->fetchArray();
		return ($position[0]['position'] == $this->getPosition());
	}
}