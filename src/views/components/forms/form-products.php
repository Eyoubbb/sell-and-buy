<label for="title"><?= FORM_TITLE ?></label>
<input type="text" id="title" name="title" placeholder="<?= FORM_TITLE_PLACEHOLDER ?>">
<label for="price"><?= FORM_PRICE ?></label>
<input type="number" id="price" name="price" placeholder="<?= FORM_PRICE_PLACEHOLDER ?>">
<label for="description"><?= FORM_DESCRIPTION ?></label>
<textarea id="description" name="description" placeholder="<?= FORM_DESCRIPTION_PLACEHOLDER ?>"></textarea>
<label for="files"><?= FORM_FILES ?></label>
<input type="file" id="files" name="files" multiple>
<input type="submit" value="Submit">