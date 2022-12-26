<div class="form">
	<form action="/submit-form" method="post">
		<?php 
			if(isset($data['forms'])) {
				require_once(PATH_FORMS . $data['forms'] . '.php');
			}
		?>
	</form>
</div>