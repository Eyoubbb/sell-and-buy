<section class="product">

	<div class="generalImage">

		<div class="secondimage">
			<div><img src="images/products/PROD-30.jpg"></div>
			<div><img src="images/products/PROD-30.jpg"></div>
			<div><img src="images/products/PROD-30.jpg"></div>
		</div>
		<div class="firstimage">
			<!-- images du produit   -->
			<img src="images/products/PROD-30.jpg">
		</div>
	</div>
	<div class="information">
		<!-- coté gauche, description du produit   -->
		<h1>
			Sandales de Papi 
		</h1>
		<p>145€</p>
		<div class="diferentestyleimage">
			<!-- images du produit en plus petit   -->
			<img src="images/products/PROD-30.jpg">
			<img src="images/products/PROD-30.jpg">

		</div>
		<p class="description">
			<!-- texte du produit    -->
			Célébrant 40 ans d'innovations dans le sport et la mode, ce modèle anniversaire de la AF1 associe des
			éléments de différentes versions à succès pour marquer le rôle majeur de cet intemporel dans l'histoire
			des
			sneakers. Les détails ornementaux, comme les touches dorées et le mini Swoosh incrusté, vous invitent à
			la
			fête. Joyeux anniversaire !

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
				echo "<img src = 'images/star.png' ";
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
						echo "<img src = 'images/star.png' ";
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