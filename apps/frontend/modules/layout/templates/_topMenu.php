<div class="navbar navbar-inverse">
  <div class="navbar-inner">
	  <div class="container">
	      <ul class="nav">
			  <li class="<?php echo ($active == 'home') ? 'active' : ''; ?>"><a href="<?php echo url_for('@homepage'); ?>"><i class="icon-home icon-white"></i>&nbsp; <?php echo __('Aukcje'); ?></a></li>
			  <li class="<?php echo ($active == 'sale') ? 'active' : ''; ?>"><a href="<?php echo url_for('@sale'); ?>"><i class="icon-shopping-cart icon-white"></i>&nbsp; <?php echo __('Kup teraz'); ?></a></li>			  
			  

			  <li class="<?php echo ($active == 'galleries') ? 'active' : ''; ?>"><a href="<?php echo url_for('@galleries'); ?>"><i class="icon-list icon-white"></i>&nbsp; <?php echo __('Galeria') ?></a></li>
			  
			  <li class="dropdown">
			    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
			        <i class="icon-folder-open icon-white"></i>&nbsp; <?php echo __('Archiwum'); ?>
			        <b class="caret"></b>
			      </a>
			    <ul class="dropdown-menu">
			      <li class="<?php echo ($active == 'archive') ? 'active' : ''; ?>"><a href="<?php echo url_for('@archive'); ?>"><i class="icon-folder-open"></i>&nbsp; <?php echo __('Aukcje'); ?></a></li>
			      <li class="<?php echo ($active == 'archive-sale') ? 'active-sale' : ''; ?>"><a href="<?php echo url_for('@archive_sale'); ?>"><i class="icon-folder-open"></i>&nbsp; <?php echo __('Sprzedaż'); ?></a></li>
			    </ul>
			  </li>

			  <li class="<?php echo ($active == 'regulamin') ? 'active' : ''; ?>"><a href="<?php echo url_for('@regulamin'); ?>"><i class="icon-tags icon-white"></i>&nbsp; <?php echo __('Regulamin') ?></a></li>
			  <?php if($sf_user->isAuthenticated()): ?>
			    <li class="<?php echo ($active == 'profile') ? 'active' : ''; ?>"><a href="<?php echo url_for('@profile'); ?>"><i class="icon-edit icon-white"></i>&nbsp; <?php echo __('Moje dane') ?></a></li>
			    <li class="<?php echo ($active == 'profile-auction') ? 'active' : ''; ?>"><a href="<?php echo url_for('@my_auction'); ?>"><i class="icon-tasks icon-white"></i>&nbsp; <?php echo __('Moje licytacje') ?></a></li>
			  <?php else: ?>
			  	<li class="<?php echo ($active == 'register') ? 'active' : ''; ?>"><a href="<?php echo url_for('@register'); ?>"><i class="icon-hdd icon-white"></i>&nbsp; <?php echo __('Rejestracja') ?></a></li>
			  	<li class="<?php echo ($active == 'login') ? 'active' : ''; ?>"><a href="<?php echo url_for('@login'); ?>"><i class="icon-arrow-left icon-white"></i>&nbsp; <?php echo __('Zaloguj się'); ?></a></li>
			  <?php endif; ?>
			  
		   </ul>
	  </div>
  </div>
  <div class="pull-left" style="margin-top: 3px;">
  	<script src="https://apis.google.com/js/plusone.js"></script>
  	<div class="g-ytsubscribe" data-channel="Przemek9540" data-layout="default"></div>
  </div>
  <div class="header-logged">
      
	  <?php if($sf_user->isAuthenticated()): ?>
	  	<?php echo __('Jesteś zalogowany jako'); ?>: <?php echo $sf_user->getGuardUser()->getFirstName(); ?> <?php echo $sf_user->getGuardUser()->getLastName(); ?> (<?php echo $sf_user->getGuardUser()->getUsername(); ?>) - <a href="<?php echo url_for('@logout'); ?>"><?php echo __('wyloguj'); ?></a>  	
	  <?php endif; ?>
	  <a href="<?php echo url_for('change_language').'?lang=pl'; ?>"> <img src="/images/ico_pl.png" /> </a> 
	  <a href="<?php echo url_for('change_language').'?lang=en'; ?>"> <img src="/images/ico_en.png" /> </a> 
	  <a href="<?php echo url_for('change_language').'?lang=cn'; ?>"> <img src="/images/ico_cn.png" /> </a> 
  	  <div id="google_translate_element"></div> 
  </div>
</div>