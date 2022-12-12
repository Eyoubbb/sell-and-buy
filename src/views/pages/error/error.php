<section class="error">
	<div class="wrapper">
		<h2><?= $data['title'] . '. ' ?><span class="extras"><?= ERROR_DEFAULT_WINDOW_TITLE ?></span></h2>
		<p><?= $data['message'] ?></p>
		<span class="extras"><?= ERROR_EXTRAS ?></span>
	</div>
	<img src="<?= PATH_IMAGES . 'error.svg'?>" alt="error">
</section>