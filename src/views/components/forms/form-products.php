<label for="name"><?= FORM_TITLE ?></label>
<input type="text" id="name" name="name" placeholder="<?= FORM_TITLE_PLACEHOLDER ?>" required <?= $edit ? 'value="' . $data['product']->getName() . '"' : '' ?>>

<label for="category_id"><?= FORM_CATEGORY ?></label>
<select id="category_id" name="category_id" required>
	<?php foreach ($data['categories'] as $category) { ?>
		<option value="<?= $category->getId() ?>" <?= $edit && $category->getId() == $data['product']->getCategoryId() ? 'selected' : '' ?>><?= $category->getName() ?></option>
	<?php } ?>
</select>

<label for="price"><?= FORM_PRICE ?></label>
<input type="number" id="price" name="price" placeholder="<?= FORM_PRICE_PLACEHOLDER ?>" required <?= $edit ? 'value="' . $data['product']->getPrice() . '"' : '' ?>>

<label for="description_fr"><?= FORM_DESCRIPTION_FR ?></label>
<textarea id="description_fr" name="description_fr" placeholder="<?= FORM_DESCRIPTION_PLACEHOLDER_FR ?>" required><?= $edit ? $data['product']->getDescriptionFr() : '' ?></textarea>

<label for="description_en"><?= FORM_DESCRIPTION_EN ?></label>
<textarea id="description_en" name="description_en" placeholder="<?= FORM_DESCRIPTION_PLACEHOLDER_EN ?>" required><?= $edit ? $data['product']->getDescriptionEn() : '' ?></textarea>

<?php if ($edit === false) { ?>
	<label for="image"><?= FORM_FILES ?></label>
	<input type="file" id="image" name="image" accept=".jpg,.png,.webp" required>
<?php } ?>

<input type="submit" value="Submit">