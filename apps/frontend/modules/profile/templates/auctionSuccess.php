<h2 style="text-align: center;"><?php echo __('Aktualne licytacje'); ?></h2>

<?php if(count($actualAuctions) > 0): ?>

	<table class="table">
		<tr>
			<th class="table-photo"><?php echo __('Zdjęcie'); ?></th>
			<th class="table-name"><?php echo __('Nazwa'); ?></th>
			<th class="table-price"><?php echo __('Cena'); ?></th>
			<th class="table-auction"><?php echo __('Licytuj'); ?></th>
		</tr>
		<?php foreach($actualAuctions as $auction): ?>

			<?php include_partial('auction/auction', array('auction' => $auction)); ?>

		<?php endforeach; ?>

	</table>

<?php else: ?>
<div style="text-align: center;"><?php echo __('Brak aktualnych licytacji'); ?></div>
<?php endif; ?>

<hr /> 

<h2 style="text-align: center;"><?php echo __('Wygrane aukcje'); ?></h2>

<?php if(count($endAuctions) > 0): ?>

	<table class="table">
		<tr>
			<th class="table-photo"><?php echo __('Zdjęcie'); ?></th>
			<th class="table-name"><?php echo __('Nazwa'); ?></th>
			<th class="table-price"><?php echo __('Cena'); ?></th>
			<th class="table-auction"><?php echo __('Licytuj'); ?></th>
		</tr>
		<?php foreach($endAuctions as $auction): ?>

			<?php include_partial('auction/auction', array('auction' => $auction, 'show_force' => true)); ?>

		<?php endforeach; ?>

	</table>

<?php else: ?>
<div style="text-align: center;"><?php echo __('Brak wygranych aukcji'); ?></div>
<?php endif; ?>