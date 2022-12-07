<?php
	$creator = $data['creator'];
	$products = $data['products'];
?>
<img class="banner" src="<?= PATH_CREATORS . $creator->getBannerUrl() ?>" alt="<?= ALT_BANNIERE ?>">
<section class="profile-container">
	<div class="blockpp">
		<img class="profilepic" src="<?= PATH_USERS . $creator->getPictureUrl() ?>" alt="<?= ALT_PROFILE_PICTURE_CREATOR ?>">
		<span class="name"><?= $creator->getFirstName() . ' ' . $creator->getLastName() ?></span>
	</div>
	<div class="texte">
		<h1><?= ABOUT ?></h1>
		<p><?= $creator->getDescription() ?></p>
		<ul>
			<li><a href="https://www.linkedin.com">Linkedin</a></li>
			<li><a href="https://www.facebook.com">Facebook</a></li>
			<li><a href="https://www.instagram.com">Instagram</a></li>
			<li><a href="https://www.twitter.com">Twitter</a></li>
		</ul>
		<div class="subscribe">
			<button type="button"><?= SUBSCRIBE ?></button>
		</div>
	</div>
</section>
<section class="products-container">
	<h2>Mes produits :</h2>
	<div class="products-wrapper">
		<?php
			foreach ($products as $product) {
				require PATH_COMPONENTS . 'product.php';
			}
		?>
	</div>
</section>