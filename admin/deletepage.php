<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">  
	<link rel="stylesheet" type="text/css" href="style/admin.css">
	<title>Pages &#45; Maltodextrin Control Panel</title>
</head>

<body>
	<div id="nav">
		<?php include 'menu.php'; ?>
	</div>
	<div id="body">
		<?php
			if (isset($_SESSION['login'])) {
				if (!$_POST['$filename']) {
					header('Location: pages.php');
				}
				$filename = $_POST['$filename'];
				$page = '../' . $filename . '.php';
				$text = '../content/' . $filename . '.txt';
				unlink($page);
				unlink($text);
				echo '<h1>Page Deleted</h1>';
				echo '<p>Page "' . $filename . '" has been deleted.</p>';
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