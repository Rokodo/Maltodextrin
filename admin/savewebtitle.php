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
				if (!$_POST['go']) {
					header('Location: pages.php');
				}
				echo '<h1>Save Website Title</h1>';
				$filepath = '../webtitle.txt';
				$contents = $_POST['editor'];
				/* Write file and display message to user. */
				$fh = fopen($filepath, 'w');
				fwrite($fh, ''); // Empty the file.
				fwrite($fh, $contents);
				fclose($fh);
				echo '<p>Website title has been saved successfully.</p>';
				/* Enable/Disable on-page website title if necessary. */
				if (isset($_POST['button1'])) {
					$on = $_POST['button1'];
					if ($on == 'On') {
						file_put_contents('../styles/setwebtitle.txt', '1');
					}
				}
				if (isset($_POST['button2'])) {
					$off = $_POST['button2'];
					if ($off == 'Off') {
						file_put_contents('../styles/setwebtitle.txt', '0');
					}		
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