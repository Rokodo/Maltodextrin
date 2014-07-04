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
			mb_internal_encoding("UTF-8");
			if (isset($_SESSION['login'])) {
				if (!$_POST['save']) {
					header('Location: pages.php');
				}
				/* Check to see if content dir exists, if not add it. */
				$dir = '../content/';
				if (!file_exists($dir)) {
					mkdir($dir, 0755); // Silence is golden.
				}
				/* Definitions. */
				$hyphen = '&#45;'; // This will be used in writing the page to a php file.
				$pagetitle = ucwords(strtolower(trim($_POST['ptitle'])));
				$newfraw = trim($_POST['mname']);
				$textcont = $_POST['editor'];
				$space = '/ /';
				$underscore = '_';
				$spacereplace = preg_replace($space, $underscore, $newfraw);
				$mname = strtolower($spacereplace);
				$phpf = '../' . $mname . '.php';
				$textf = '../content/' . $mname . '.txt';
				$style = file_get_contents('../styles/styleinfo.txt');
				$phpcont = 
				'<!DOCTYPE html>' . "\n" . 
				'<html>' . "\n" . 
				'<head>' . "\n\t" . 
					'<meta charset="UTF-8">' . "\n\t" . 
					'<?php' . "\n\t\t" . 
						'mb_internal_encoding("UTF-8");' . "\n\t\t" . 
						'$style = file_get_contents' . "('./styles/styleinfo.txt');" . "\n\t\t" . 
						"echo '" . '<link rel="stylesheet" type="text/css" href="' . "styles/' ." . ' $style ' . ". '" . '.css">' . "' . " . '"\n\t"' . ';' . "\n\t\t".
						'$favicon = file_get_contents' . "('./styles/favicon.txt');" . "\n\t\t" . 
						"echo '" . '<link rel="shortcut icon" type="image/x-icon" href="' . "styles/' ." . ' $favicon ' . ". '" . '.ico">' . "' . " . '"\n\t"' . ';' . "\n\t\t" . 
						'$webtitle = file_get_contents' . "('webtitle.txt');" . "\n\t\t" . 
						"echo '<title>" . $pagetitle . ' ' . $hyphen . ' ' . "' . " . '$webtitle' . " . '" . "</title>'" . " . " . '"\n\t"' . ';' . "\n\t" . 
					'?>' . "\n" . 
				'</head>' . "\n\n" . 
				'<body>' . "\n\t" . 
					'<div id="logo">' . "\n\t\t" . 
						'<!-- Calls logo div from stylesheet, no page text goes here. -->' . "\n\t" . 
					'</div>' . "\n\t" . 
					'<div id="sitename">' . "\n\t\t" . 
						'<?php' . "\n\t\t\t" . 
							'$webtitle' . " = file_get_contents('./webtitle.txt');" . "\n\t\t\t" . 
							'$settitle' . " = file_get_contents('./styles/setwebtitle.txt');" . "\n\t\t\t" . 
							"if (" . '$settitle' . " == '1') {" . "\n\t\t\t\t" . 
								'echo $webtitle . "\n";' . "\n\t\t\t" . 
							'}' . "\n\t\t\t" . 
							'else {' . "\n\t\t\t\t" . 
								"echo '<!-- Website title disabled. -->'" . ' . "\n";' . "\n\t\t\t" . 
							'}' . "\n\t\t" . 
						'?>' . "\n\t" . 
					'</div>' . "\n\t" . 
					'<div id="nav">' . "\n\t\t" . 
						'<!-- Menu component. -->' . "\n\t\t" . 
						'<nav>'."\n\t\t" . 
						"<?php include 'menu.php'; ?>" . "\n\t\t" . 
						'</nav>' . "\n\t" . 
					'</div>' . "\n\t" . 
					'<div id="body">' . "\n\t\t" . 
						"<?php include 'content/" . $mname . ".txt'; ?>" . "\n\t\t" . 
						'<br>' . "\n\t" . 
					'</div>' . "\n\t" . 
					'<div id="footer">' . "\n\t\t" . 
						'<!-- Footer component. -->' . "\n\t\t" . 
						"<?php include 'footer.php'; ?>" . "\n\t" . 
					'</div>' . "\n" . 
				'</body>' . "\n" . 
				'</html>';
				/* Write to files. */
				file_put_contents($phpf, $phpcont);
				file_put_contents($textf, $textcont);
				/* Action complete. */
				echo 'New page has been created!' . "\n";
			}
		?>
	</div>
	<div id="footer">
		<?php include 'footer.php'; ?>
	</div>
</body>
</html>