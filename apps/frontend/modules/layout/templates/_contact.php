<h4 style="text-align: center;"><?php echo __('Formularz kontaktowy'); ?></h4>
<form action="<?php echo url_for('@contact') ?>" method="post">
<table style="width: 400px; min-width: 400px; min-width: 400px; margin: 0 auto;">
	<?php echo $form; ?>
	<tr>
		<td></td>
		<td><input type="submit" value="<?php echo __('Wyślij'); ?>" /></td>
	</tr>
</table>
</form>