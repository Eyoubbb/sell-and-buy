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
	?>


	<?php 
		$data['forms'] = 'form-profile';
		require(PATH_FORMS . 'form.php');

		$data['forms'] = 'form-products';
		require(PATH_FORMS . 'form.php');
	?>
</section>