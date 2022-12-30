<div class="form">
	<form method="POST" <?= $data['enctype'] ? 'enctype="' . $data['enctype'] . '"' : "" ?>>
		<?php
			if(isset($data['forms'])) {
				require_once(PATH_FORMS . $data['forms'] . '.php');
			}
		?>
	</form>
</div>