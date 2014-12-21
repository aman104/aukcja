<div class="main-gallery">
<?php if(count($auctions) > 0): ?>

		<?php foreach($auctions as $auction): ?>

			<?php include_partial('auction/picture', array('auction' => $auction)); ?>

		<?php endforeach; ?>

<?php endif; ?>	

<?php if(count($sales) > 0): ?>

		<?php foreach($sales as $sale): ?>

			<?php include_partial('sale/picture', array('sale' => $sale)); ?>

		<?php endforeach; ?>

<?php endif; ?>	
</div>