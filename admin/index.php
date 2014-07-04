<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8"> 
	<link rel="stylesheet" type="text/css" href="style/admin.css">
	<link rel="shortcut icon" type="image/x-icon" href="style/images/favicon.ico">
	<title>Welcome &#45; Maltodextrin Control Panel</title>
</head>

<body>
	<div id="nav">
		Please sign in.
	</div>
	<div id="body">
		<?php
			if (isset($_SESSION['login'])) {
				header('Location: pages.php');
			}
		?>
		<img src="style/images/login.png" alt="Maltodextrin Control Panel">
		<form method="post" name="login" action="login.php">
		Username:
		<br>
		<input type="text" name="username">
		<br>
		<br>
		Password: 
		<br>
		<input type="password" name="password">
		<br>
		<br>
		<input type="submit" name="submit" value="Login">
		</form>
	</div>
	<div id="footer">
		<?php include('footer.php'); ?>
	</div>
</body>
</html>