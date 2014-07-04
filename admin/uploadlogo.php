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
				if (!$_POST['submit']) {
					header('Location: pages.php');
				}
				if ($_FILES['file']['error'] > 0) {
					echo 'Error: No file.';
					} 
				elseif ($_FILES['file']['type'] !== 'image/png') {
					echo 'Error: File type is not PNG.';
				}
				else {
					/* Find out information about the current theme logo. */
					$style = file_get_contents('../styles/styleinfo.txt');
					$dir = strstr($style, '/', true);
					$logo = '../styles/' . $dir . '/images/logo.png';
					$upload = $_FILES['file']['tmp_name'];
					unlink($logo); // Delete current logo.
					rename($upload, $logo); // Set new logo.
					echo 'Upload: ' . $_FILES['file']['name'] . '<br>';
					echo 'Type: ' . $_FILES['file']['type'] . '<br>';
					echo 'Size: ' . ($_FILES['file']['size'] / 1024) . 'kB<br>';
					list($width, $height) = getimagesize($logo);
					$size = $width . 'px * ' . $height . 'px'; // Logo dimensions.
					echo '<br>';
					echo 'New Logo: ' . $size;
					echo '<img src="../styles/' . $dir . '/images/logo.png" alt="Current Logo" />';
					// TO DO: POLISH THIS (caching issue).
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