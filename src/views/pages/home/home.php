<section class="banner">
	<img src="<?=PATH_IMAGES . 'banner.svg'?>" alt="banner" srcset="">
</section>

<section class="filter">
	<?php require_once(PATH_COMPONENTS . 'filter.php'); ?>
</section>

<section class="products">
	<?php
		foreach ($data['products'] as $product) {

			$creator = $data['creators'][$product->getCreatorId()];
			
			require PATH_COMPONENTS . 'product.php';
		}

		require_once(PATH_COMPONENTS . 'form.php')
	?>
</section>