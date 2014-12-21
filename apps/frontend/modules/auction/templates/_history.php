<?php $histories = $auction->getAllHistory(); ?>
<?php if(count($histories) > 0): ?>
<table class="table table-bordered table-striped table-history" style="">
	<tr>
		<th># Lp.</th>
		<th style="width: 90px;">Login</th>
		<th style="width: 90px; text-align: center;"><?php echo __('Cena'); ?></th>
		<th style="width: 90px; text-align: center;"><?php echo __('Kraj'); ?></th>		
		<th><?php echo __('Data'); ?></th>
	</tr>
	<?php $i = 1; foreach($histories as $one): ?>
	<tr>
		<td><?php echo $i++; ?>.</td>
		<td><?php echo $one->getProfile()->getsfGuardUser()->getUsername(); ?></td>		
		<td style="text-align: center;">
			<?php echo $one->getPriceActual(); ?> EUR 
			<?php echo ($one->getBuyingOrder()) ? __('m.o') : ''; ?>
		</td>
		<td style="text-align: center;"><?php echo $one->getProfile()->getCountry(); ?></td>
		<td><?php echo $one->getCreatedAt(); ?></td>
	</tr>
	<?php endforeach; ?>
</table>	
<?php else: ?>
	<h6 style="text-align: center;"><?php echo __('Aktualnie brak historii'); ?></h6>
<?php endif; ?>