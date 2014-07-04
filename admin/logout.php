<?php
	unset($_SESSION['login']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8"> 
	<link rel="stylesheet" type="text/css" href="style/admin.css">
	<link rel="shortcut icon" type="image/x-icon" href="style/images/favicon.ico">
	<title>Pages &#45; Maltodextrin Control Panel</title>
</head>

<body>
	<div id="nav">
		Logging out...
	</div>
	<div id="body">
		<?php
			session_start();
			session_destroy();
			header('Location: index.php'); 
		?>
	</div>
	<div id="footer">
		<?php include 'footer.php'; ?>
	</div>
</body>
</html>