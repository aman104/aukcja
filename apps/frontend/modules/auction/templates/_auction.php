<?php $show_force = isset($show_force) ? $show_force : false; ?>
<?php $slim = isset($slim) ? $slim : false; ?>
<?php $td_class = ($auction->isLastMinutes(30) && ! $auction->isEnd() ) ? 'auction-ended' : ''; ?>
<?php if( ! $slim): ?>
<tr class="tr-auction" id="tr-auction-<?php echo $auction->getPrimaryKey(); ?>">
<?php endif; ?>
	<td class="<?php echo $td_class; ?>">
		<div class="auction-params">
			<div class="auction-param-id"><?php echo $auction->getPrimaryKey(); ?></div>
			<div class="auction-param-h-id"><?php if($auction->getHistoryWinner()) echo $auction->getHistoryWinner()->getPrimaryKey(); ?></div>
			<div class="auction-param-time"><?php echo ($auction->isLastMinutes(30)) ? '1' : '0'; ?></div>
		</div>
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
		</a>
	</td>
	<td class="<?php echo $td_class; ?>">
		<h5><?php echo $auction->getName(); ?></h5>
		<strong><?php echo __('Płeć'); ?>: </strong><?php echo __($auction->getSex()); ?><br />
		<strong><?php echo __('Hodowca'); ?>: </strong><?php echo $auction->getBreeder(); ?><br />
		<?php if($auction->isEnd()): ?>
			<span style="color: red"><strong><?php echo __('Aukcja zakończona'); ?></strong></span><br />
			<span style="color: red"><strong><?php echo $auction->getExpiredAt(); ?></strong></span><br />
		<?php else: ?>
			<strong><?php echo __('Data zakończenia'); ?>: </strong><br />
			<span class="end-time"><?php echo $auction->getExpiredAt(); ?></span><br />
		<?php endif; ?>
	</td>
	<td class="td-price <?php echo $td_class; ?>">
		<?php include_partial('auction/price', array('auction' => $auction, 'js' => 'tr_js', 'show_force' => $show_force)); ?>
	</td>
	<td class="td-auction <?php echo $td_class; ?>">
		<?php include_partial('auction/buttons', array('auction' => $auction)); ?>
	</td>	
<?php if( ! $slim): ?>
</tr>
<?php endif; ?>