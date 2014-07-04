<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="style/admin.css">
	<link rel="shortcut icon" type="image/x-icon" href="style/images/favicon.ico">
	<title>Pages &#45; Maltodextrin Control Panel</title>
</head>

<body>
	<div id="nav">
		<?php include 'menu.php'; ?>
	</div>
	<div id="body">
		<?php
			if (isset($_SESSION['login'])) {
				if(!($_POST['filepath'])) {
					header('Location: pages.php');
				}
				echo '<h1>Save Changes</h1>';
				$filepath = $_POST['filepath'];
				$contents = $_POST['editor'];
				/* Write file and display message to user. */
				$fh = fopen($filepath, 'w');
				fwrite($fh, ''); // Empty the file.
				fwrite($fh, $contents);
				fclose($fh);
				echo '<p>Page module has been saved successfully.</p>';
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