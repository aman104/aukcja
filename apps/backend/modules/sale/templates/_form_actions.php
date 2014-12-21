<style>

.gallery {
	clear: both;
	overflow: hidden;
}

.gallery-one {
	width: 150px;
	height: 150px;
	float: left;
	text-align: center;
	border: 1px solid #ddd;
	margin: 2px;
}

</style>

<div class="gallery">

	<?php $pictures = $form->getObject()->getOrderedPictures(); ?>

	<?php if(count($pictures) > 0): ?>
	<h2>Galeria zdjęć</h2>
	<?php endif ?>

	<?php foreach($pictures as $picture): ?>
		<div class="gallery-one">
			<img src="/uploads/pictures/sale/<?php echo $picture->getFile(); ?>" style="width: 120px; height: 90px; margin: 3px;" />
			<br />
			<a href="<?php echo url_for('sale_picture_delete', $picture); ?>">Usuń</a><br />
			<?php if($picture->getIsDefault()): ?>
				Obrazek domyślny
			<?php else: ?>
				<a href="<?php echo url_for('sale_picture_default', $picture); ?>">Ustaw jako domyślne</a>
			<?php endif; ?>
			<br />
			<a href="<?php echo url_for('sale_picture_prev', $picture); ?>"><img src="/sfAdminDashPlugin/images/previous.png" /></a>
			<a href="<?php echo url_for('sale_picture_next', $picture); ?>"><img src="/sfAdminDashPlugin/images/next.png" /></a>
		</div>
	<?php endforeach; ?>

</div>


<ul class="sf_admin_actions">
<?php if ($form->isNew()): ?>
  <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
  <?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save_and_add',  'label' => 'Save and add',)) ?>
<?php else: ?>
  <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
  <?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save_and_add',  'label' => 'Save and add',)) ?>
<?php endif; ?>
</ul>
