<h1 style="text-align: center;"><?php echo __('Rejestracja'); ?></h1>
<br /><br />
<form action="<?php echo url_for('@register'); ?>" method="post">
	<table class="table form-register">
		<?php echo $form; ?>
		<tr>
			<td colspan="2" style="text-align: right">
				<input type="submit" value="<?php echo __('Zarejestruj się'); ?>" class="btn btn-primary" />
			</td>
		</tr>
	</table>
</form>