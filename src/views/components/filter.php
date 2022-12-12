<div class="filter-container">
	<div class="filter-item">
		<a href="<?= $homeUrl ?>">
			<?= FILTER_ALL ?>
		</a>
	</div>

	<div class="filter-item dropdown">
		<button><?= FILTER_CATEGORIES ?></button>
		<ul class="dropdown-content">
			<?php
				foreach ($data['categories'] as $category) {
					echo <<<HTML
						<li>
							<a href="?category={$category->getId()}">
								{$category->getName()}
							</a>
						</li>
					HTML;
				}
			?>
	   </ul>
	</div>
</div>