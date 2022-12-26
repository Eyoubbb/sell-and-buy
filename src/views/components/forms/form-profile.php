<label for="name"><?= FORM_NAME ?></label>
<input type="text" id="title" name="title" placeholder="<?= FORM_NAME_PLACEHOLDER ?>">

<label for="bio"><?= FORM_BIO ?></label>
<textarea type="text" id="bio" name="bio" placeholder="<?= FORM_BIO_PLACEHOLDER ?>"></textarea>

<div class="input-wrapper">
	<label for="twitter"><?= FORM_TWITTER ?></label>
	<input type="text" class="social-media" name="twitter" placeholder="<?= FORM_TWITTER_PLACEHOLDER ?>">
</div>
<div class="input-wrapper">
	<label for="instagram"><?= FORM_INSTAGRAM ?></label>
	<input type="text" class="social-media" name="instagram" placeholder="<?= FORM_INSTAGRAM_PLACEHOLDER ?>">
</div>
<div class="input-wrapper">
	<label for="linkedin"><?= FORM_LINKEDIN ?></label>
	<input type="text" class="social-media" name="linkedin" placeholder="<?= FORM_LINKEDIN_PLACEHOLDER ?>">
</div>
<input type="submit" value="Update">
