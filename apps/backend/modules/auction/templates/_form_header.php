<?php if($form->getObject()->isEnd() && !$form->getObject()->isNew()): ?>
<center>
	
	<h1 style="text-align: center;">Aukcja zakończona</h1>

	<?php if($auction->getWinner()): ?>
		<strong style="font-size: 20px;">Zwycięzca: <a href="<?php echo url_for('sf_guard_user_edit', $auction->getWinner()->getSfGuardUser()) ?>"><?php echo $auction->getWinner()->getSfGuardUser()->getUsername(); ?></a> <?php echo $auction->getPrice(); ?> EUR</strong>
	<?php else: ?>
		Nikt nie licytował aukcji
	<?php endif; ?>

	
</center>
<br />

<?php endif; ?>
