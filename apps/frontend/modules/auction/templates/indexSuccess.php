<?php $auctions = $pager->getResults(); ?>



<?php include_partial('auction/pager', array('pager' => $pager)); ?>

<?php if(count($auctions) > 0): ?>

	<?php include_partial('layout/updates'); ?>

	<table class="table">
		<tr>
			<th class="table-photo"><?php echo __('Zdjęcie'); ?></th>
			<th class="table-name"><?php echo __('Nazwa'); ?></th>
			<th class="table-price"><?php echo __('Cena'); ?></th>
			<th class="table-auction"><?php echo __('Licytuj'); ?></th>
		</tr>
		<?php foreach($auctions as $auction): ?>

			<?php include_partial('auction/auction', array('auction' => $auction)); ?>

		<?php endforeach; ?>

	</table>

	<script>
	$(function() {
	setInterval(function() {
	      checkAuctions();
		}, 25000);
	});
	</script>

<?php else: ?>
	<h4 style="text-align: center;"><?php echo __('Brak aukcji'); ?></h4>
<?php endif; ?>	

<?php include_partial('auction/pager', array('pager' => $pager)); ?>


