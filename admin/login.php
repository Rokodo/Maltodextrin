<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8"> 
	<link rel="stylesheet" type="text/css" href="style/admin.css">
	<link rel="shortcut icon" type="image/x-icon" href="style/images/favicon.ico">
	<title>Logging in... &#45; Maltodextrin Control Panel</title>
</head>

<body>
	<div id="nav">
		Logging in...
	</div>
	<div id="body">
		<?php
			/* Redirects the user if they try to access login.php directly. */
			if (!$_POST['login']) {
				header ('Location: index.php');
			}
			if (!isset($_SESSION['login'])) {
				/* http://www.tonylea.com/2011/creating-a-simple-php-login-without-a-database/ */
				session_start();
				$username = 'admin'; // Change this to your chosen username.
				$password = 'change_me'; // Change this to your chosen password.
				$random1 = 'and_me'; // For improved security, change from default.
				$random2 = 'me_too!'; // For improved security, change from default.
				$hash = md5($random1 . $password . $random2);
				if ($_POST['username'] == $username && $_POST['password'] == $password){
					$_SESSION['login'] = $hash;
					header('Location: pages.php'); 
				}
				/* Housekeeping in case previous session existed. */
				else {
					session_destroy();
					$_SESSION = array(); 
					echo 'Login failed, please <a href="index.php">try again</a>.</div>';
				}
			}
		?>
	</div>
	<div id="footer">
		<?php include 'footer.php'; ?>
	</div>
</body>
</html>