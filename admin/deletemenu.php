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
				if (!$_POST) {
					header('Location: pages.php');
				}
				echo '<h1>Delete a Page</h1>';
				echo '<form method="post" action="deletepage.php">';
				echo '<p>Select a page to delete. WARNING: This action is permanent.</p>';
				/* List out files */
				/* If your website is in a subdirectory and ../ is set to go to root public_html, you may have to change $pagesraw to glob('../subdirectory/content/*.{txt}' */
				$pagesraw = glob('../*.{php}', GLOB_BRACE);
				echo '<form method="post" action="deletepage.php">';
				foreach ($pagesraw as $filename) {
					/* See not above regarding subdirectory and apply same rule to $path if necessary. */
					$path = '../'; // Based on php files, to edit text file(s) for these pages.
					$pathreplace = '';
					$pagelist = str_replace($path, $pathreplace, $filename); // Pick out files.
					$pagestrip = substr_replace($pagelist, "", -4); // Remove ".php" for buttons.
					/* Define files you don't want to be edited from the menu by editing/adding to the $unwanted array. */
					$search = array();
					$search[0] = $filename;
					$search[1] = $pagestrip;
					$unwanted = array();
					$unwanted[0] = '/500/'; // Put your 404 page here if you have one.
					$unwanted[1] = '/menu/'; // Module used on every page of website.
					$unwanted[2] = '/footer/'; // Module used on every page of website.
					$unwanted[3] = '/index/'; // To protect the default homepage file.
					$rem = 'removeme';
					$remfiles = preg_replace($unwanted, $rem, $pagestrip);
					$listing = '<input type="submit" name="$filename" value="' . $remfiles . '"><br>';
					if ($listing !== '<input type="submit" name="$filename" value="removeme"><br>') {
						echo $listing; // Any value of "removeme" as defined by $unwanted ignored.
					}
				}	
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