<?php $auctions = $pager->getResults(); ?>



<?php include_partial('auction/pager', array('pager' => $pager, 'url' => url_for('@overview'))); ?>


<?php if(count($auctions) > 0): ?>

		

		<table class="table table-striped">
		
		<?php $i = 1; foreach($auctions as $auction): ?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td>
				<a href="<?php echo url_for('auction', $auction); ?>"><?php echo $auction->getName(); ?></a>
				<br />
				<?php echo $auction->getBreeder(); ?>
			</td>
			<td>
				<?php if($auction->getSex() == 'Samica'): ?>
					<img src="/images/sex2.png" />				
				<?php elseif($auction->getSex() == 'Samiec'): ?>
					<img src="/images/sex1.png" />
				<?php else: ?>
					<?php echo __($auction->getSex()); ?>
				<?php endif; ?>
			</td>
			<td>
				<?php echo $auction->getPrice(); ?> EUR <br />
				<?php $hw = $auction->getHistoryWinner(); ?>
				<?php if($hw): ?>
				<?php echo $hw->getProfile()->getSfGuardUser()->getUsername(); ?> 
				(<?php echo $auction->getHistoryWinner()->getProfile()->getCountry(); ?>)
				<?php endif; ?>
			</td>
			<td style="width: 180px;">
				<span class="end-time" style="display: inline"><?php echo $auction->getExpiredAt(); ?></span>
			</td>

		</tr>
		<?php endforeach; ?>
		</table>

<?php endif; ?>

<?php include_partial('auction/pager', array('pager' => $pager, 'url' => url_for('@overview'))); ?>


