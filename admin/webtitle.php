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
				echo '<form method="post" action="savewebtitle.php">';
				echo 'Enable/Disable on web pages: <input type="radio" name="button1" value="On" /> On <input type="radio" name="button2" value="Off" /> Off';
				echo '<br>';
				echo '<textarea name="editor" rows="20" cols="1">';
				readfile('../webtitle.txt');
				echo '</textarea>';
				echo '<br>';
				echo '<input type="submit" name="go" value="Save">';
				echo '</form>';
				echo '<br>';
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