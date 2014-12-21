<?php
	$moduleName = sfContext::getInstance()->getModuleName();
	$actionName = sfContext::getInstance()->getActionName();
	///echo $moduleName.' '.$actionName;
?>



	<?php if($moduleName == 'auction' && $actionName == 'index'): ?>
		<ul class="breadcrumb">
		  <li><a href="<?php echo url_for('homepage'); ?>"><?php echo __('Strona główna'); ?></a> <span class="divider">/</span></li>
		  <li class="active"><?php echo __('Wszystkie aukcje'); ?></li>
		</ul>
	<?php endif; ?>

	<?php if($moduleName == 'auction' && $actionName == 'auction'): ?>
		<ul class="breadcrumb">
		  <li><a href="<?php echo url_for('homepage'); ?>"><?php echo __('Strona główna'); ?></a> <span class="divider">/</span></li>
		  <li><a href="<?php echo url_for('auctions'); ?>"><?php echo __('Wszystkie aukcje'); ?></a> <span class="divider">/</span></li>
		  <li class="active"><?php echo __('Aukcja'); ?></li>
		</ul>
	<?php endif; ?>

	<?php if($moduleName == 'profile' && $actionName == 'profile'): ?>
		<ul class="breadcrumb">
		  <li><a href="<?php echo url_for('homepage'); ?>"><?php echo __('Strona główna'); ?></a> <span class="divider">/</span></li>
		  <li class="active"><?php echo __('Profil'); ?></li>
		</ul>
	<?php endif; ?>

	<?php if($moduleName == 'profile' && $actionName == 'auction'): ?>
		<ul class="breadcrumb">
		  <li><a href="<?php echo url_for('homepage'); ?>"><?php echo __('Strona główna'); ?></a> <span class="divider">/</span></li>
		  <li><a href="<?php echo url_for('profile'); ?>"><?php echo __('Profil'); ?></a> <span class="divider">/</span></li>
		  <li class="active"><?php echo __('Moje licytacje'); ?></li>
		</ul>
	<?php endif; ?>

	<?php if($moduleName == 'sfGuardAuth' && $actionName == 'register'): ?>
		<ul class="breadcrumb">
		  <li><a href="<?php echo url_for('homepage'); ?>"><?php echo __('Strona główna'); ?></a> <span class="divider">/</span></li>
		  <li class="active"><?php echo __('Rejestracja'); ?></li>
		</ul>
	<?php endif; ?>

	<?php if($moduleName == 'sfGuardAuth' && $actionName == 'signin'): ?>
		<ul class="breadcrumb">
		  <li><a href="<?php echo url_for('homepage'); ?>"><?php echo __('Strona główna'); ?></a> <span class="divider">/</span></li>
		  <li class="active"><?php echo __('Logowanie'); ?></li>
		</ul>
	<?php endif; ?>


	<?php if($moduleName == 'homepage' && $actionName == 'regulamin'): ?>
		<ul class="breadcrumb">
		  <li><a href="<?php echo url_for('homepage'); ?>"><?php echo __('Strona główna'); ?></a> <span class="divider">/</span></li>
		  <li class="active"><?php echo __('Regulamin'); ?></li>
		</ul>
	<?php endif; ?>