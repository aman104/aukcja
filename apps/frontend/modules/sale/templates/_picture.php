<?php 
	$picture = $sale->getDefaultPicture();
	if($picture)
	{
		$src =	$picture->getPath();
	}
	else
	{
		$src = '/images/img.jpg';
	}
?>
<a href="<?php echo url_for('sale_one', $sale); ?>">
	<img class="img-pigeon" src="<?php echo $src; ?>" />
	<span><?php echo $sale->getName(); ?></span>
</a>