<form method="POST">
	<div class="field">
		<label for="input-description"><?= CREATOR_DESCRIPTION ?></label>
		<input type="text" name="description" placeholder=" " id="input-description" required>
		<?php
			/*if (isset($data['error']) && $data['error'] === 'INVALID_EMAIL') {
				echo '<span class="error">' . LOGIN_EMAIL_ERROR . '</span>';
			}*/
		?>
	</div>
	
	<div class="commands">
		<button class="submit"><?= CREATOR_SUBMIT ?></button>
	</div>
</form>