<?php
	$product = $data['product'];
	$creator = $data['creator'];
?>
<section class="product">

	<div class="generalImage">

		<div class="secondimage">
			<div><img src="<?= PATH_PRODUCTS . $product->getImageUrl() ?>"></div>
			<div><img src="<?= PATH_PRODUCTS . $product->getImageUrl() ?>"></div>
			<div><img src="<?= PATH_PRODUCTS . $product->getImageUrl() ?>"></div>
		</div>
		<div class="firstimage">
			<!-- images du produit   -->
			<img src="<?= PATH_PRODUCTS . $product->getImageUrl() ?>">
		</div>
	</div>
	<div class="information">
		<!-- coté gauche, description du produit   -->
		<h1><?= $product->getName() ?></h1>
		<?php
			if ($product->getDiscountPercentage() > 0) {
				$newPrice = round($product->getPrice() - ($product->getPrice() * $product->getDiscountPercentage() / 100), 0);

				echo <<<HTML
					<p>
						<del>{$product->getPrice()} €</del>
					</p>
					<p>
						$newPrice €
					</p>
				HTML;
			} else {
				echo "<p>{$product->getPrice()} €</p>";
			}
		?>
		<div class="diferentestyleimage">
			<!-- images du produit en plus petit   -->
			<img src="<?= PATH_PRODUCTS . $product->getImageUrl() ?>">
			<img src="<?= PATH_PRODUCTS . $product->getImageUrl() ?>">

		</div>
		<p class="description">
			<!-- texte du produit    -->
			<?= $product->getDescription() ?>
		</p>

		<div class="cart">
			<!-- ajouter au panier   -->
			<button>ajouter au panier</button>
		</div>

	</div>

</section>

<section  class ="similararticles" > 
	<div> 
		<h2> Articles similaires </h2>
	</div>
</section>

<section class ="clientreview ">
	
	<div class ="commentstitle"> 
		<h2> Avis clients(3):</h2>
		<div class ="mark">
			<?php
			for ($i=1 ; $i<6 ; $i++){
				echo "<img src='" . PATH_IMAGES . "star.png' ";
				if ($i<=3) {
					echo "class='starvalid'";
				}
				echo "/>";
			}
			?>
		</div>
	</div>
	<div class = "comments">
		<?php for($comment=0 ; $comment <3 ; $comment++){ ?>
		<article class="comment">
			<h3> Trop grand </h3>
			<div class="commenthead">
				<div class ="mark"> 
					<?php
					for ($i=1 ; $i<6 ; $i++){
						echo "<img src = '". PATH_IMAGES . "star.png' ";
						if ($i<=2) {
							echo "class='starvalid'";
						}
						echo "/>";
					}
					?>
				</div>
				<p class="author"> Monsieur pas content </p>
				<p class="commentdate"> 21 janvier 2054 <p>
			</div>
			<p class="commentdescription"> 
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam recusandae cupiditate alias maxime. Nulla veritatis amet quod, reiciendis in eum. <p>
		</article>	
		<?php } ?>
		<div class="addcomment">
			<!-- ajouter un commentaire   -->
			<button>Ajouter un commentaire</button>
		</div>
	</div>
</section>