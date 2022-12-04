<a class="item-product" href="">
	<div class="image">
		<img src="<?= PATH_PRODUCTS . $product->getImageUrl() ?>" alt="" loading="lazy">
	</div>
	<div class="content-text">
		<div class="left">
			<p class="product-name"><?= $product->getName() ?></p>
			<p class="creator"><?= $creator->getFirstName() ?> <?= $creator->getLastName() ?></p>
		</div>
		<div class="right">
			<?php
				if ($product->getDiscountPercentage() > 0) {
					$newPrice = round($product->getPrice() - ($product->getPrice() * $product->getDiscountPercentage() / 100), 0);

					echo <<<HTML
						<p class="price">
							<del>{$product->getPrice()} €</del>
						</p>
						<p class="discount">
							$newPrice €
						</p>
					HTML;
				} else {
					echo '<p class="price">' . $product->getPrice() . ' €</p>';
				}
			?>
		</div>
	</div>
</a>