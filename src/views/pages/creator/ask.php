<section class="wrapper-form">
	<form method="POST" enctype="multipart/form-data">
		<ul class="progress-bar">
			<li class="active"><?= CREATOR_PROGRESS_STEP_ONE ?></li>
			<li><?= CREATOR_PROGRESS_STEP_TWO ?></li>
			<li><?= CREATOR_PROGRESS_STEP_THREE ?></li>
			<li><?= CREATOR_PROGRESS_STEP_FOUR ?></li>
		</ul>
		<fieldset class="step active">
			<div class="field">
				<label for="input-motive"><?= CREATOR_MOTIVE ?></label>
				<textarea name="motive" id="input-motive" maxlength="500" cols="30" rows="10" placeholder="<?= CREATOR_PLACEHOLDER_TEXTAREA ?>" required></textarea>
			</div>
			<div class="commands">
				<button class="next" type="button"><?= REGISTER_NEXT ?></button>
			</div>
		</fieldset>
		<fieldset class="step">
			<div class="field">
				<label for="input-address"><?= CREATOR_ASK_ADDRESS ?></label>
				<input type="address" name="address" placeholder="<?= CREATOR_PLACEHOLDER ?> " id="input-address" required>
				<label for="input-phone-number"><?= CREATOR_ASK_NUMBER ?></label>
				<input type="tel" name="phone" pattern="[0-9]+" placeholder="<?= CREATOR_PLACEHOLDER ?>" id="input-phone-number" required>
			</div>
			<div class="commands">
				<button class="previous" type="button"><?= REGISTER_PREVIOUS ?></button>
				<button class="next" type="button"><?= REGISTER_NEXT ?></button>
			</div>
		</fieldset>
		<fieldset class="step special">
			<div class="field">
				<label for="instagram"><?= CREATOR_SOCIALS ?></label>
				<input class="socials" type="text" name="social" placeholder="<?= CREATOR_INSTAGRAM ?>" id="instagram">
				<input class="socials" type="text" name="social" placeholder="<?= CREATOR_FACEBOOK ?>" id="facebook">
				<input class="socials" type="text" name="social" placeholder="<?= CREATOR_LINKEDIN ?>" id="linkedin">
				<input class="socials" type="text" name="social" placeholder="<?= CREATOR_TWITTER ?>" id="twitter">
				<input class="socials" type="text" name="social" placeholder="<?= CREATOR_TIKTOK ?>" id="tiktok">
			</div>
			<div class="commands">
				<button class="previous" type="button"><?= REGISTER_PREVIOUS ?></button>
				<button class="next" type="button"><?= REGISTER_NEXT ?></button>
			</div>
		</fieldset>
		<fieldSet class="step special">
			<div class="field">
				<label for="input-banner"><?= CREATOR_BANNIERE ?></label>
				<input type="file" name="banner" id="input-banner" required>
				
				<label for="input-description"><?= CREATOR_DESCRIPTION ?></label>
				<textarea name="motive" id="input-description" maxlength="500" cols="30" rows="10" placeholder="<?= CREATOR_PLACEHOLDER_TEXTAREA ?>" required></textarea>
			</div>
			<div class="commands">
				<button class="submit"><?= CREATOR_SUBMIT ?></button>
			</div>
		</fieldset>
	</form>
</section>