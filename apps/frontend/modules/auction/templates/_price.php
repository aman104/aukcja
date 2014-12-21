<?php $show_force = isset($show_force) ? $show_force : false; ?>

<?php $classCountDown = 'kkcount-down-'.$auction->getPrimaryKey(); ?>

<?php if(!$show_force && !$auction->isEnd() && $auction->isLastMinutes(30)): ?>
<h4><?php echo __('Pozostało'); ?>: <br />
<span time="<?php echo strtotime($auction->getExpiredAt()); ?>" class="timer <?php echo $classCountDown; ?>"></span>
</h4>
<?php endif; ?>


<h4>
<?php if($auction->isNewAuction()): ?>
	<?php echo __('Cena wywoławcza'); ?>:
<?php elseif($auction->isEnd()): ?>
	<?php echo __('Cena końcowa'); ?>:
<?php else: ?>
	<?php echo __('Aktualna cena'); ?>: <br />
	<small style="font-size: 14px;"><?php echo $auction->getHistoryWinner()->getProfile()->getSfGuardUser()->getUsername(); ?> (<?php echo $auction->getHistoryWinner()->getProfile()->getCountry(); ?>)</small>
<?php endif; ?>
<br />
	<span class="price">
	<?php echo $auction->getPrice(); ?> EUR
	</span>
</h4>
<?php echo $auction->getPricesByCurrencies(); ?> PLN

<?php if(!$show_force): ?>
<?php include_partial('auction/'.$js, array('auction' => $auction, 'classCountDown' => $classCountDown)); ?>
<?php endif; ?>



