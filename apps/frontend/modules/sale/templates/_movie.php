<?php if($sale->getMovie()): ?>
	<h5 style="text-align: center;"><?php echo __('Film'); ?></h5>
	<div style="text-align: center;">
		<iframe width="420" height="315" src="http://www.youtube.com/embed/<?php echo $sale->getMovie(); ?>" frameborder="0" allowfullscreen></iframe>
	</div>
	<br />
<?php endif; ?>	