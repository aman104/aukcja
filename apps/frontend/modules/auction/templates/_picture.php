<?php 
	$picture = $auction->getDefaultPicture();
	if($picture)
	{
		$src =	$picture->getPath();
	}
	else
	{
		$src = '/images/img.jpg';
	}
?>
<a href="<?php echo url_for('auction', $auction); ?>">
	<img class="img-pigeon" src="<?php echo $src; ?>" />
	<span><?php echo $auction->getName(); ?></span>
</a>