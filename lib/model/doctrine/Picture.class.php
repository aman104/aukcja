<?php

/**
 * Picture
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    aukcje
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Picture extends BasePicture
{

	public function save(Doctrine_Connection $conn = null)
	{
		
		if($this->isNew())
		{
			$position = PictureTable::getInstance()->getNextPictureByAuctionId($this->getAuctionId());
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

		$auction = $this->getAuction();
		parent::delete();
		$pictures = $auction->getPictures();
		if(count($pictures) > 0)
		{
			$pictures[0]->setIsDefault(true);
			$pictures[0]->save();
		}

		PictureTable::getInstance()->setForceOrderByAuctionId($auction->getPrimaryKey());

		return true;
	}

	public function generateThumbnails()
	{
		if(file_exists(sfConfig::get('sf_upload_dir').'/pictures/'.$this->getFile()))
		{
			$thumbnail = new sfThumbnail(120, 90, true, false, 100, 'sfImageMagickAdapter');
			$thumbnail->loadFile($this->getPath(false, true));
			$thumbnail->save(sfConfig::get('sf_upload_dir').'/thumbnails/min/'.$this->getFile()); 
			chmod(sfConfig::get('sf_upload_dir').'/thumbnails/min/'.$this->getFile(), 0777);

			$thumbnail = new sfThumbnail(800, 600, true, false, 100, 'sfImageMagickAdapter');
			$thumbnail->loadFile($this->getPath(false, true));
			$thumbnail->save(sfConfig::get('sf_upload_dir').'/thumbnails/max/'.$this->getFile()); 
			chmod(sfConfig::get('sf_upload_dir').'/thumbnails/max/'.$this->getFile(), 0777);
		}
		
	}

	public function getPath($thumb = false, $absolute = false)
	{

		$prefix = ($absolute) ? sfConfig::get('sf_upload_dir') : '/uploads';

		if($thumb)
		{
			return $prefix.'/thumbnails/'.$thumb.'/'.$this->getFile();
		}
		else
		{
			return $prefix.'/pictures/'.$this->getFile();	
		}
		
	}

	public function copyFile()
	{
		$source = $this->getPath(false, true);
		$name = md5(time().'picture'.$this->getPrimaryKey());
		$ext = explode('.',$this->getFile());
		$name = $name.'.'.$ext[1];

		$desc = sfConfig::get('sf_upload_dir').'/pictures/'.$name;

		copy($source, $desc);
		chmod($desc, 0777);

		return $name;

	}

	public function setNext()
	{
		if( ! $this->isLast())
		{
			$pos = $this->getPosition() + 1;
			$next = PictureTable::getInstance()->getByPositionAndAuctionId($pos, $this->getAuctionId());
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
			$prev = PictureTable::getInstance()->getByPositionAndAuctionId($pos, $this->getAuctionId());
			$prev->setPosition($this->getPosition());
			$this->setPosition($pos);

			$prev->save();
			$this->save();
		}
	}

	public function isFirst()
	{
		$id = $this->getAuctionId();
		$q = Doctrine_Query::create()
			->select('position')
			->from('Picture')
			->addWhere('auction_id = ?', $id)
			->orderBy('position asc')
			->limit(1);
		$position = $q->fetchArray();
		return ($position[0]['position'] == $this->getPosition());
	}

	public function isLast()
	{
		$id = $this->getAuctionId();
		$q = Doctrine_Query::create()
			->select('position')
			->from('Picture')
			->addWhere('auction_id = ?', $id)
			->orderBy('position desc')
			->limit(1);
		$position = $q->fetchArray();
		return ($position[0]['position'] == $this->getPosition());
	}

}