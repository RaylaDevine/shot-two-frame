<div class="carousel-inner">
	<div class="item window <?php if( $id == 0): ?>active<?php endif; ?>">
		<?php foreach($images as $id): $image = gt_image($id); ?>
			<img src="<?php echo $image['full']; ?>" alt="<?php echo $image['alt']; ?>">
		<?php endforeach; ?>
	</div>
</div>