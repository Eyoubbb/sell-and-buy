<?php 
	$newPrice = round($product->getPrice() - ($product->getPrice() * $product->getDiscountPercentage() / 100), 0);
	$productURL = $data['routes']['GET:Product#index']->getUrl([
		'id' => $product->getId()]);
 ?>

<tr>
	<td>
		<a>
			<img src="<?= PATH_IMAGES . 'x.svg' ?>" alt="delete" loading="lazy">
		</a>
	</td>
	<td>
		<a href="<?= $productURL ?>">
			<div class="item-wrapper">
				<img class="img-cart" src="<?= PATH_PRODUCTS . $product->getImageUrl() ?>" alt="img-cart" loading="lazy">
			</div>
		</a>
	</td>
	<td>
		<a class="name" href="<?= $productURL ?>"><?= $product->getName() ?></a>
	</td>
	<td>
		<input type="number" name="quantity" id="quantity" value="1" min="0">
	</td>
	<td class="price"><?= $newPrice . ' €' ?></td>
	<td></td>
</tr>