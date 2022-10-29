<!DOCTYPE html>
<html lang="<?= $data['lang'] ?>">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		if (isset($data['stylesheets'])) {
			foreach ($data['stylesheets'] as $stylesheet) {
				$path = PATH_CSS.$stylesheet.'.css';
				echo '<link rel="stylesheet" href="'.$path.'">';
			}
		}
	?>
	<title>Sell &amp; Buy<?= isset($data['title']) ? ' - '.$data['title'] : '' ?></title>
</head>
<body>
	<?php
		require_once PATH_COMPONENTS.'header.php';
	
		require_once PATH_PAGES.$data['view'].'.php';

		require_once PATH_COMPONENTS.'footer.php';
	?>
</body>
</html>