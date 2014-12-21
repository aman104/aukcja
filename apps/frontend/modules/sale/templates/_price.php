<div style="text-align: center">
	<h4 style="text-align: center">
		<?php echo __('Cena'); ?>: <br />
		<span class="price">
			<?php echo $sale->getPrice(); ?> EUR
		</span>
	</h4>
	<?php echo $sale->getPricesByCurrencies(); ?> PLN
</div>