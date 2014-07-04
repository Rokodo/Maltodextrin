<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="style/admin.css">
	<link rel="shortcut icon" type="image/x-icon" href="style/images/favicon.ico">
	<title>Themes &#45; Maltodextrin Control Panel</title>
</head>

<body>
	<div id="nav">
		<?php include 'menu.php'; ?>
	</div>
	<div id="body">
		<?php
			if (isset($_SESSION['login'])) {
				echo '<h1>Select a Theme</h1>';
				$dirlist = '../styles/*';
				foreach (glob($dirlist, GLOB_ONLYDIR) as $dir) {
					$style = ucwords(preg_replace('/_/', ' ', str_replace('../styles/', '', $dir)));
					echo '<h3>' . $style . '</h3>';
					echo '<form method="post" action="settheme.php">';
					echo '<a href="' . $dir . '/images/preview.png" target="_blank"><img src="' . $dir . '/images/preview_thumb.png" alt="preview" /></a>';
					echo '<input type="hidden" name="settheme" value="' . $style . '">';
					echo '<input type="submit" name="submit" value="Set Theme: ' . $style . '">';
					echo '</form>' . "\n";
				}
			}
			else {
				header('Location: index.php');
			}
		?>
	</div>
	<div id="footer">
		<?php include 'footer.php'; ?>
	</div>
</body>
</html>