<?php $sales = $pager->getResults(); ?>

<?php include_partial('sale/pager', array('pager' => $pager)); ?>

<?php if(count($sales) > 0): ?>

		<table class="table">
		<tr>
			<th class="table-photo"><?php echo __('Zdjęcie'); ?></th>
			<th class="table-name"><?php echo __('Nazwa'); ?></th>
			<th class="table-price"><?php echo __('Kup teraz'); ?></th>
		</tr>
		<?php foreach($sales as $sale): ?>

			<?php include_partial('sale/sale', array('sale' => $sale)); ?>

		<?php endforeach; ?>
		</table>

<?php else: ?>
	<h4 style="text-align: center;"><?php echo __('Brak przedmiotów na sprzedaż'); ?></h4>
<?php endif; ?>	

<?php include_partial('sale/pager', array('pager' => $pager)); ?>