<!DOCTYPE html>
<html lang="<?= $data['lang'] ?>">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Open+Sans:wght@400;700&family=Source+Code+Pro:wght@400;700&display=swap" rel="stylesheet">

	<?php
		if (!(isset($data['header']) && $data['header'] === false)){
            $path = PATH_JS . 'header.js';
            echo "<script src=\"$path\" defer></script>";
		}

		if (!(isset($data['footer']) && $data['footer'] === false)){
            $path = PATH_JS . 'footer.js';
            echo "<script src=\"$path\" defer></script>";
		}

		if (isset($data['stylesheets'])) {
			foreach ($data['stylesheets'] as $stylesheet) {
				$path = '/'.PATH_CSS.$stylesheet.'.css';
				echo '<link rel="stylesheet" href="'.$path.'">';
			}
		}
		if (isset($data['scripts'])) {
            foreach ($data['scripts'] as $script) {
                
                $path = PATH_JS . $script['name'] . '.js';
                $attr = $script['attr'] ?? '';
                echo "<script src=\"$path\" $attr></script>";
            }
        }

	?>

	<title>Sell &amp; Buy<?= isset($data['title']) ? ' - '.$data['title'] : '' ?></title>
</head>
<body>
	<?php
		if (!(isset($data['header']) && $data['header'] === false)) {
			require_once PATH_COMPONENTS . 'header.php';
		}

		require_once PATH_PAGES . $data['view'] . '.php';

		if (!(isset($data['footer']) && $data['footer'] === false)) {
			require_once PATH_COMPONENTS . 'footer.php';
		}
	?>
</body>
</html>