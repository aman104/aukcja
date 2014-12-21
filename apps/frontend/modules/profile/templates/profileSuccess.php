<h4 style="text-align: center;"><?php echo __('Zmiana hasła'); ?></h4>

<form action="<?php url_for('@profile'); ?>" method="post">
<table class="table form-register">
	<?php echo $form1; ?>
	<tr>
		<td></td>
		<td style="text-align: right;"><input type="submit" value="<?php echo __('Zapisz'); ?>" /></td>
	</tr>
</table>

</form>

<h4 style="text-align: center;"><?php echo __('Edycja danych'); ?></h4>

<form action="<?php url_for('@profile'); ?>" method="post">
<table class="table form-register">
	<?php echo $form2; ?>
	<?php /*
	<tr>
		<td></td>
		<td style="text-align: right;"><input type="submit" value="<?php echo __('Zapisz'); ?>" /></td>
	</tr>
	*/ ?>
</table>

</form>