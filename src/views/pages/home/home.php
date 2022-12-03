<section class="banner">
	<img src="<?=PATH_IMAGES . 'banner.svg'?>" alt="banner" srcset="">
</section>

<section class="filter">
	<?php require_once(PATH_COMPONENTS . 'filter.php'); ?>
</section>

<section class="products">
	<?php
		$productName = $data['products'][0]->getName();
		$price = $data['products'][0]->getPrice();
		$url = $data['products'][0]->getImageUrl()
	?>

	<?php
		require(PATH_COMPONENTS . 'product.php');
		require(PATH_COMPONENTS . 'product.php');
		require(PATH_COMPONENTS . 'product.php');
		require(PATH_COMPONENTS . 'product.php');
		require(PATH_COMPONENTS . 'product.php');
		require(PATH_COMPONENTS . 'product.php');
		require(PATH_COMPONENTS . 'product.php');
		require(PATH_COMPONENTS . 'product.php');
	?>

</section>