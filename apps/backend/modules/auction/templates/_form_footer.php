<h3 style="text-align: center;">Historia aukcji</h3>
<?php $auction = $form->getObject(); ?>
<?php $histories = $auction->getAllHistory(); ?>
<?php if(count($histories) > 0): ?>
<table class="table table-bordered" style="width: 450px; min-width: 450px; max-width: 450px; margin: 0 auto;">
	<tr>
		<th>Lp.</th>
		<th>Login</th>
		<th>Kraj</th>
		<th>Cena</th>
		<th>Data</th>
	</tr>
	<?php $i = 1; foreach($histories as $one): ?>
	<tr>
		<td><?php echo $i++; ?>.</td>
		<td><?php echo $one->getProfile()->getsfGuardUser()->getUsername(); ?></td>
		<td><?php echo $one->getProfile()->getCountry(); ?></td>
		<td>
			<?php echo $one->getPriceActual(); ?> EUR 
			<?php echo ($one->getBuyingOrder()) ? 'm.o' : ''; ?>
		</td>
		<td><?php echo $one->getCreatedAt(); ?></td>
	</tr>
	<?php endforeach; ?>
</table>	
<?php else: ?>
	<h6 style="text-align: center;">Aktualnie brak historii</h6>
<?php endif; ?>

