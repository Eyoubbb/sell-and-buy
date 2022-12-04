<div class="filter-container">
	<div class="all">
		<a href="<?= $homeUrl ?>">
			<?= FILTER_ALL ?>
		</a>
	</div>

	<div class="dropdown">
	   <?= FILTER_CATEGORIES ?>
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