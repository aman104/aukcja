<div class="well">

<h1 style="text-align: center;"><?php echo __('Zaloguj się'); ?></h1>

	<div class="login-form">
		<?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>
	</div>

</div>