<?php $more = isset($more) ? $more : true; ?>

<?php if($sf_user->isAuthenticated()): ?>

	<?php if($auction->isEnd()): ?>

		<?php if($auction->getWinner()): ?>
			<strong><?php echo __('Zwycięzca'); ?>: <?php echo $auction->getWinner()->getSfGuardUser()->getUsername(); ?></strong>	
		<?php else: ?>
			<strong><?php echo __('Nikt nie licytował aukcji'); ?></strong>
		<?php endif; ?>	

	<?php elseif($auction->isActualWinner()): ?>
		
		<span style="color: green; font-size: 14px; font-weight: bold;"><?php echo __('Aktualnie wygrywasz aukcje'); ?>
		<br />
		<?php echo __('Twoja maksymalna cena'); ?>: <br /> <?php echo $auction->getPriceMax(); ?> EUR</span>
		<br />
		<?php if($auction->getHistoryWinner()->getBuyingOrder()): ?>
		<?php echo __('Zmień maksymalną ofertę'); ?>: <br />
		<form class="licitationForm" action="<?php echo url_for('auction', $auction); ?>" method="post">
			<input type="text" class="price-input maxPrice3-<?php echo $auction->getPrimaryKey(); ?>" name="auction[price]" value="<?php echo $auction->getNextPrice(); ?>" /> EUR		
			<input type="hidden" name="auction[buying_order]" value="1" />
			<input type="hidden" name="auction[change]" value="1" />
			<input type="submit" class="btn btn-primary" onclick="if (confirm('<?php echo __("Na pewno chcesz dodać ofertę do aukcji na").' '; ?> ' + $('.maxPrice3-<?php echo $auction->getPrimaryKey(); ?>').val() + ' <?php echo ' EUR'; ?> ?')) { return true} else {return false; }" value="<?php echo __('Oferuj'); ?>" />
		</form>
		<?php endif; ?>

		
	<?php else: ?>
	<?php echo __('Maksymalna oferta'); ?>: <br />
	<form class="licitationForm" action="<?php echo url_for('auction', $auction); ?>" method="post">
		<input type="text" class="price-input maxPrice1-<?php echo $auction->getPrimaryKey(); ?>" name="auction[price]" value="<?php echo $auction->getNextPrice(); ?>" /> EUR		
		<input type="hidden" name="auction[buying_order]" value="1" />
		<input type="submit" class="btn btn-primary" onclick="if (confirm('<?php echo __("Na pewno chcesz dodać ofertę do aukcji na").' '; ?> ' + $('.maxPrice1-<?php echo $auction->getPrimaryKey(); ?>').val() + ' <?php echo ' EUR'; ?> ?')) { return true} else {return false; }" value="<?php echo __('Oferuj'); ?>" />
	</form>
	<?php echo __('Licytuj'); ?> <br />
	<form class="licitationForm" action="<?php echo url_for('auction', $auction); ?>" method="post">
		<input type="text" class="price-input maxPrice2-<?php echo $auction->getPrimaryKey(); ?>" name="auction[price]" value="<?php echo $auction->getNextPrice(); ?>" /> EUR		
		<input type="hidden" name="auction[buying_order]" value="0" />
		<input type="submit" class="btn btn-primary" onclick="if (confirm('<?php echo __("Na pewno chcesz licytować aukcje na").' '; ?> ' + $('.maxPrice2-<?php echo $auction->getPrimaryKey(); ?>').val() + ' <?php echo ' EUR'; ?> ?')) { return true} else {return false; }" value="<?php echo __('Licytuj'); ?>" />
	</form>
	<?php endif; ?>
<?php else: ?>
	<a href="<?php echo url_for('@login'); ?>"><span style="color: red"><?php echo __('Musisz być zalogowany by móc licytować'); ?></span></a>
	<br />		<br />
<?php endif; ?>
<?php if($more): ?>	
	<a class="btn" href="<?php echo url_for('auction', $auction); ?>" class=""><?php echo __('Szczegóły'); ?> &raquo;</a>
<?php endif; ?>
