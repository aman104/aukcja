<div class="span2">
	<h4 class="btn btn-primary" style="text-align: center;"><?php echo __('Ostatnie oferty'); ?></h4>
	<br /><br />

	<?php if(count($auctions)): ?>

		<?php foreach($auctions as $one): ?>
		<?php $ids[] = $one['auction_id']; ?>
		<?php endforeach; ?>


		<?php $realAuctions = AuctionTable::getInstance()->findAuctionsByIds($ids, true); ?>

		<?php foreach($auctions as $one): ?>

				<?php 
					$auction = $realAuctions[$one['auction_id']];
					if($auction->isEnd()) continue;
				?>
				<a href="<?php echo url_for('auction', $auction); ?>"><strong><?php echo $auction->getName(); ?></strong></a><br />
				<?php echo $auction->getPrice(); ?> EUR - <?php echo $auction->getHistoryWinner()->getProfile()->getSfGuardUser()->getUsername(); ?> (<?php echo $auction->getHistoryWinner()->getProfile()->getCountry(); ?>)
				<hr />
			

		<?php endforeach; ?>

	<?php else: ?>

		<?php echo __('Brak aktualnych ofert'); ?>

	<?php endif; ?>

	<a href="<?php echo url_for('@contact'); ?>" class="btn btn-success"><?php echo __('Kontakt') ?></a>

</div>	