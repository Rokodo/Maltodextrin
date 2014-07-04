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
				if (!$_POST['settheme']) {
					header('Location: pages.php');
				}
				echo '<h1>Set Website Theme</h1>';
				$filepath = '../styles/styleinfo.txt';
				$themename = preg_replace('/ /', '_', $_POST['settheme']);
				$themetext = preg_replace('/_/', ' ', $themename);
				$contents = strtolower($themename . '/' . $themename);
				/* Write styleinfo file. */
				$fh = fopen($filepath, 'w');
				fwrite($fh, ''); // Empty the file.
				fwrite($fh, $contents);
				fclose($fh);
				/* Compose and write to favicon file */
				file_put_contents('../styles/favicon.txt', strtolower($themename) . '/images/favicon');
				/* Output message. */
				echo '<p>Theme <a href="../styles/' . $contents . '.css" target="_blank">' . $themetext . '</a> is now the active website theme: <br> <a href="../styles/' . strtolower($themename) . '/images/preview.png" target="_blank"><img src="../styles/' . strtolower($themename) . '/images/preview_thumb.png" alt="preview" /></a> </p>'; 
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