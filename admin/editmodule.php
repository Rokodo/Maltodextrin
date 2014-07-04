<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="style/admin.css">
	<title>Pages &#45; Maltodextrin Control Panel </title>
</head>

<body>
	<div id="nav">
		<?php include 'menu.php'; ?>
	</div>
	<div id="body">
		<?php
			mb_internal_encoding("UTF-8");
			if (isset($_SESSION['login'])) {
				if (!$_POST['filename']) {
				header('Location: pages.php');
				}
				echo '<h1>Compose Page Content</h1>';
				echo '<form method="post" action="savemodule.php">';
				$filename = $_POST['filename'];
				$filepath = '../' . $filename . '.php';
				$filecho = $filename . '.php';
				$textfile = '../content/' . $filename . '.txt';
				$txtecho = $filename . '.txt';
				echo 'Module file: <a href="' . $filepath . '" target=_blank>' . $filecho . '</a><br>';
				echo '<br>';
				echo '<textarea name="editor" rows="20" cols="1">';
				readfile($filepath);
				echo '</textarea>';
				echo '<br>';
				echo '<input type="hidden" name="filepath" value="' . $filepath . '">';
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