
<div class="main-container">
<a class="btn btn-success" href="<?php echo url_for('@sale'); ?>">&laquo; <?php echo __('powrót do wszystkich aukcji'); ?></a>
<br /><br />
<table>
	<tr class="tr-auction">
	<td>
		<?php 
			$picture = $sale->getDefaultPicture();
			if($picture)
			{
				$src =	$picture->getPath();
			}
			else
			{
				$src = '/images/img.jpg';
			}
		?>

			<img style="height: auto; width: 350px;" class="img-pigeon" src="<?php echo $src; ?>" />

	</td>
	<td style="padding-left: 40px;">
		<h5><?php echo $sale->getName(); ?></h5>
		<strong><?php echo __('Ojciec'); ?>: </strong><br />
		<span><?php echo $sale->getFather(); ?></span><br /><br />
		<strong><?php echo __('Matka'); ?>: </strong><br />
		<span><?php echo $sale->getMother(); ?></span><br /><br />
		<strong><?php echo __('Hodowca'); ?>: </strong><br />
		<span><?php echo $sale->getBreeder(); ?></span><br /><br />
		<strong><?php echo __('Właściciel'); ?>: </strong><br />
		<span><?php echo $sale->getOwner(); ?></span><br />
	</td>
</table>
<br />
<?php include_partial('sale/price', array('sale' => $sale)); ?>
<p>
	<strong><?php echo __('Opis'); ?>:</strong><br />
	<?php echo $sale->getDescription(ESC_RAW); ?>
</p>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pl_PL/all.js#xfbml=1&appId=282228638541718";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like" data-href="http://<?php echo $_SERVER['SERVER_NAME'].url_for('sale_one', $sale) ?>" data-width="The pixel width of the plugin" data-height="The pixel height of the plugin" data-colorscheme="light" data-layout="standard" data-action="like" data-show-faces="true" data-send="false"></div>
<div class="clearfix"></div>
<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://<?php echo $_SERVER['SERVER_NAME'].url_for('sale_one', $sale) ?>">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

<?php if($sale->getIsActive()): ?>
<br /><br />
<div style="text-align: center">
<a style="padding-left: 40px; padding-right: 40px;" class="btn btn-danger btn-large" href="#form"><?= __('Kup teraz'); ?></a>
</div>
<?php endif; ?>
<br /><br />

<?php include_partial('sale/movie', array('sale' => $sale)); ?>

<?php include_partial('sale/gallery', array('sale' => $sale)); ?>
<br /><br />
<?php include_partial('sale/price', array('sale' => $sale)); ?>			

<?php if($sale->getIsActive()): ?>
<br /><br /><br />
<a name="form"></a>
<form action="<?php echo url_for('sale_one', $sale) ?>" method="post">
<table class="sale-form">
<?php echo $form; ?>
<tr>
	<td colspan="2" style="text-align: center;">
		<button style="padding-left: 40px; padding-right: 40px;" class="btn btn-primary btn-large" type="submit"><?php echo __('Kup'); ?></button>		
	</td>
</tr>
</table>
</form>
<?php endif; ?>

