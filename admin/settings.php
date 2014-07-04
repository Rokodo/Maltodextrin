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
				echo '<h1>Settings</h1>';
				echo '<h2>Website Title</h2>';
				echo '<form method="post" action="webtitle.php">';
				echo '<input type="submit" name="webtitle" value="Edit and Enable/Disable Website Title">';
				echo '</form>';
				echo '<br>';
				echo '<h2>Website Logo</h2>';
				echo '<form method="post" action="weblogo.php">';
				echo '<input type="submit" name="weblogo" value="Change Active Theme Logo">';
				echo '</form>' . "\n";
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