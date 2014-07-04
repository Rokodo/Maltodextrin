<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="style/admin.css">
	<link rel="shortcut icon" type="image/x-icon" href="style/images/favicon.ico">
	<title>Settings &#45; Maltodextrin Control Panel</title>
</head>

<body>
	<div id="nav">
		<?php include 'menu.php'; ?>
	</div>
	<div id="body">
		<?php 
			if (isset($_SESSION['login'])) {
				/* Find out information about the current theme logo. */
				$style = file_get_contents('../styles/styleinfo.txt');
				$dir = strstr($style, '/', true);
				$themename = ucwords(preg_replace('/_/', ' ', $dir));
				$logo = '../styles/' . $dir . '/images/logo.png';
				list($width, $height) = getimagesize($logo);
				$size = $width . 'px * ' . $height . 'px'; // Logo dimensions.
				echo '<h1>Settings</h1>';
				echo '<h2>Website Logo</h2>';
				echo 'Change the website logo (current active theme).';
				echo '<br>';
				echo '<br>';
				echo 'Note: This may be a repeating image depending on the theme, please save a copy of the current logo (right click, save as) in case you change your mind.';
				echo '<br>';
				echo '<br>';
				echo 'Theme: ' . $themename;
				echo '<br>';
				echo '<br>';
				echo 'Logo: ' . $size;
				echo '<img src="../styles/' . $dir . '/images/logo.png" alt="Current Logo" />';
				echo '<br>';
				echo '<form action="uploadlogo.php" method="post" enctype="multipart/form-data">';
				echo '<label for="file">Replace Logo (PNG only):</label>';
				echo '<input type="file" name="file" id="file">';
				echo '<input type="submit" name="submit" value="Upload">';
				echo '</form>';
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