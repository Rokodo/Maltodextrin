<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<?php
		mb_internal_encoding("UTF-8");
		$style = file_get_contents('./styles/styleinfo.txt');
		echo '<link rel="stylesheet" type="text/css" href="styles/' . $style . '.css">' . "\n\t";
		$favicon = file_get_contents('./styles/favicon.txt');
		echo '<link rel="shortcut icon" type="image/x-icon" href="styles/' . $favicon . '.ico">' . "\n\t";
		$webtitle = file_get_contents('webtitle.txt');
		echo '<title>Demo Page &#45; ' . $webtitle . '</title>' . "\n\t";
	?>
</head>

<body>
	<div id="logo">
		<!-- Calls logo div from stylesheet, no page text goes here. -->
	</div>
	<div id="sitename">
		<?php
			$webtitle = file_get_contents('./webtitle.txt');
			$settitle = file_get_contents('./styles/setwebtitle.txt');
			if ($settitle == '1') {
				echo $webtitle . "\n";
			}
			else {
				echo '<!-- Website title disabled. -->' . "\n";
			}
		?>
	</div>
	<div id="nav">
		<!-- Menu component. -->
		<nav>
		<?php include 'menu.php'; ?>
		</nav>
	</div>
	<div id="body">
		<?php include 'content/demo_page.txt'; ?>
		<br>
	</div>
	<div id="footer">
		<!-- Footer component. -->
		<?php include 'footer.php'; ?>
	</div>
</body>
</html>