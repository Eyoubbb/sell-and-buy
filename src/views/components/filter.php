<div class="filter-container">
	<div class="all">
		<?= FILTER_ALL ?>
	</div>

	<div class="dropdown">
	   <?= FILTER_CATEGORIES ?>
	   <ul class="dropdown-content">
			<li><a href="?category=1"><?= CATEGORIE_BEAUTIES ?></a></li>
			<li><a href="?category=2"><?= CATEGORIE_SPORTWEAR ?></a></li>
			<li><a href="?category=3"><?= CATEGORIE_SMARTPHONES ?></a></li>
			<li><a href="?category=4"><?= CATEGORIE_JEWELERY ?></a></li>
			<li><a href="?category=5"><?= CATEGORIE_BEAUTIES ?></a></li>

	   </ul>
	</div>

	<div class="dropdown">
		<?= FILTER_CREATOR ?>
		<ul class="dropdown-content">
			<li><a href="?creator=1">Nike</a></li>
			<li><a href="?creator=2">Adidas</a></li>
			<li><a href="?creator=3">Louis Vuitton</a></li>
		</ul>
	</div>
</div>