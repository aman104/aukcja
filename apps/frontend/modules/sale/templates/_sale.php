<tr class="tr-auction">
	<td>
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
			<img style="height: auto; width: 300px;" class="img-pigeon" src="<?php echo $src; ?>" />
		</a>
	</td>
	<td>
		<h5><?php echo $sale->getName(); ?></h5>
		<strong><?php echo __('Ojciec'); ?>: </strong><br />
		<span><?php echo $sale->getFather(); ?></span><br /><br />
		<strong><?php echo __('Matka'); ?>: </strong><br />
		<span><?php echo $sale->getMother(); ?></span><br /><br />
		<strong><?php echo __('Hodowca'); ?>: </strong><br />
		<span><?php echo $sale->getBreeder(); ?></span><br />
	</td>
	<td style="vertical-align: top !important;" class="td-price <?php echo $td_class; ?>">
		<h4>
			<?php echo __('Cena'); ?>: <br />
			<span class="price">
				<?php echo $sale->getPrice(); ?> EUR
			</span>
		</h4>
		<?php echo $sale->getPricesByCurrencies(); ?> PLN
		<br />
		<?php if($sale->getIsActive()): ?>
		<a style="padding-left: 40px; padding-right: 40px; margin-bottom: 10px; margin-top: 10px;" class="btn btn-danger" href="<?php echo url_for('sale_one', $sale); ?>#form"><?= __('Kup teraz'); ?></a>
		<br />
		<?php endif; ?>
		<a class="btn" href="<?php echo url_for('sale_one', $sale); ?>" class=""><?php echo __('Szczegóły'); ?> &raquo;</a>
	</td>
</tr>