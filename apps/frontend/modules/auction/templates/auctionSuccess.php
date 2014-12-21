<?php include_partial('layout/updates'); ?>

<a class="btn btn-success" href="<?php echo url_for('@auctions'); ?>">&laquo; <?php echo __('powrót do wszystkich aukcji'); ?></a>
<br /><br />
<div class="main-container">

	<div class="auction-params">
		<div class="auction-param-id"><?php echo $object->getPrimaryKey(); ?></div>
		<div class="auction-param-h-id"><?php if($object->getHistoryWinner()) echo $object->getHistoryWinner()->getPrimaryKey(); ?></div>
		<div class="auction-param-time"><?php echo ($object->isLastMinutes(30)) ? '1' : '0'; ?></div>
	</div>	

	<div class="well pigeon-box">

			<?php $default = $object->getDefaultPicture(); ?>
			<?php if($default): ?>
				<img class="img-pigeon2" src="/uploads/pictures/<?php echo $default->getFile(); ?>" />
			<?php endif; ?>

			<h5><?php echo $object->getName(); ?></h5>
			<strong><?php echo __('Płeć'); ?>: </strong><?php echo __($object->getSex()); ?><br />
			<strong><?php echo __('Hodowca'); ?>: </strong><?php echo $object->getBreeder(); ?><br />
			<?php if($object->isEnd()): ?>
				<span style="color: red"><strong><?php echo __('Aukcja zakończona'); ?></strong></span><br />
			<?php else: ?>
				<strong><?php echo __('Data zakończenia'); ?>: </strong>
				<span class="end-time" style="display: inline"><?php echo $object->getExpiredAt(); ?></span>
					<br />
			<?php endif; ?>	

			<div style="clear: both">

			<?php include_partial('auction/gallery', array('auction' => $object)); ?>			

			<?php include_partial('auction/movie', array('auction' => $object)); ?>

			<p>
				<strong><?php echo __('Opis aukcji'); ?>:</strong><br />
				<?php echo $object->getDescription(ESC_RAW); ?>
			</p>

			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/pl_PL/all.js#xfbml=1&appId=282228638541718";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>

			<div class="fb-like" data-href="http://<?php echo $_SERVER['SERVER_NAME'].url_for('auction', $object) ?>" data-width="The pixel width of the plugin" data-height="The pixel height of the plugin" data-colorscheme="light" data-layout="standard" data-action="like" data-show-faces="true" data-send="false"></div>
			<div class="clearfix"></div>
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://<?php echo $_SERVER['SERVER_NAME'].url_for('auction', $object) ?>">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>


			</div>
			
			<div class="auction-forms">
				<?php include_partial('auction/price', array('auction' => $object, 'js' => 'auction_js')); ?>
				<br />
				<?php include_partial('auction/buttons', array('auction' => $object, 'more' => false)); ?>
			</div>		

			

			<div style="clear: both">
				<hr />	
				<h5 style="text-align: center;"><?php echo __('Historia licytacji'); ?></h5>
				<?php include_partial('auction/history', array('auction' => $object)); ?>
				<br />
				<?php include_component('layout', 'contact'); ?>


			</div>

	</div>

</div>

<a class="btn btn-success" href="<?php echo url_for('@auctions'); ?>">&laquo; <?php echo __('powrót do wszystkich aukcji'); ?></a>

<script>
$(function() {
setInterval(function() {
      checkAuctions(true);
	}, 25000);
});
</script>