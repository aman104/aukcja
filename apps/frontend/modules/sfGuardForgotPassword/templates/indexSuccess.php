<div class="well">

<h1 style="text-align: center;"><?php echo __('Przypomnienie hasła'); ?></h1>

<p><?php echo __('Podaj swój adres email w celu przypomnienia hasła'); ?></p>

	<form action="<?php echo url_for('@sf_guard_forgot_password') ?>" method="post">
	  <table>
	    <tbody>
	      <?php echo $form ?>
	    </tbody>
	    <tfoot><tr><td><input type="submit" class="btn btn-primary" name="change" value="<?php echo __('Wyślij'); ?>" /></td></tr></tfoot>
	  </table>
	</form>

</div>	

