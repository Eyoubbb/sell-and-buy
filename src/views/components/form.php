<div class="form">
	<form action="/submit-form" method="post">
		<label for="title"><?= FORM_TITLE ?></label><br>
		<input type="text" id="title" name="title" placeholder="<?= FORM_TITLE_PLACEHOLDER ?>"><br>
		<label for="price"><?= FORM_PRICE ?></label><br>
		<input type="number" id="price" name="price" placeholder="<?= FORM_PRICE_PLACEHOLDER ?>"><br>
		<label for="description"><?= FORM_DESCRIPTION ?></label><br>
		<textarea id="description" name="description" placeholder="<?= FORM_DESCRIPTION_PLACEHOLDER ?>"></textarea><br>
		<label for="files"><?= FORM_FILES ?></label><br>
		<input type="file" id="files" name="files" multiple><br>
		<input type="submit" value="Submit">
	</form>
</div>