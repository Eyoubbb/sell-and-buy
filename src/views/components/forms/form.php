<div class="form">
	<form method="POST" <?= isset($enctype) ? 'enctype="' . $enctype . '"' : "" ?>>
		<?php
			if(isset($forms)) {
				require_once(PATH_FORMS . $forms . '.php');
			}
		?>
	</form>
</div>