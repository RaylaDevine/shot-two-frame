
<?php foreach($images as $id): $image = gt_image($id); ?>
		<li class='carousel-image'>
			<a class="image-link" href="<?php echo $image['full']; ?>" data-lightbox="example-set">
				<img class="thumb-image fancybox" src="<?php echo $image['large']; ?>" alt="<?php echo $image['alt']; ?>">
			</a>
		</li>
<?php endforeach; ?>