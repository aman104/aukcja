<?php $pictures = $auction->getPicturesWithoutDefault(); ?>
<?php if(count($pictures) > 0): ?>
<div id="gallery">
<h5 style="text-align: center;"><?php echo __('Galeria'); ?></h5>

<?php foreach($pictures as $picture): ?>
	<a href="<?php echo $picture->getPath(); ?>"><img src="<?php echo $picture->getPath(); ?>" width="120" height="90" alt="" style="height: 80px; width: 120px;" /></a>
<?php endforeach; ?>
</div>

<script type="text/javascript">
$(function() {
	$('#gallery a').lightBox();
});
</script>
<?php endif; ?>