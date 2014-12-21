<?php $pictures = $sale->getPicturesWithoutDefault(); ?>
<?php if(count($pictures) > 0): ?>
<div id="gallery">
<h5 style="text-align: center;"><?php echo __('Galeria'); ?></h5>

<?php foreach($pictures as $picture): ?>
	<a href="<?php echo $picture->getPath(); ?>"><img src="<?php echo $picture->getPath(); ?>" width="240" height="160" alt="" style="height: 160px; width: 240px;" /></a>
<?php endforeach; ?>
</div>

<script type="text/javascript">
$(function() {
	$('#gallery a').lightBox();
});
</script>
<?php endif; ?>