<?php if ($sf_user->hasFlash('notice')): ?>
  <div id="alert-box" class="alert alert-success"><?php echo __($sf_user->getFlash('notice')) ?></div>
<?php endif; ?>
 
<?php if ($sf_user->hasFlash('error')): ?>
  <div id="alert-box" class="alert alert-error"><?php echo __($sf_user->getFlash('error')) ?></div>
<?php endif; ?>