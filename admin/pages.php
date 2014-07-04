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
			if (isset($_SESSION['login'])) {
				echo '<h1>Pages</h1>';
				echo '<h2>Create or Delete a Page</h2>';
				echo '<p>Create a new website page or delete an existing one:</p>';
				echo '<form method="post" action="createmenu.php">';
				echo '<input type="submit" name="createpage" value="Create Page">';
				echo '</form>';
				echo '<form method="post" action="deletemenu.php">';
				echo '<input type="submit" name="deletepage" value="Delete Page">';
				echo '</form>';
				echo '<br>';
				echo '<h2>Edit Existing Page Content</h2>';
				echo '<p>By default, "index" refers to home page content and it is renamed "Home" dynamically on the front-end website navigation menu. If you wish to change this behaviour, edit the menu module of the website (advanced users only).</p>';
				echo '<br>';
				/* List out files */
				/* If your website is in a subdirectory and ../ is set to go to root public_html, you may have to change $pagesraw to glob('../subdirectory/content/*.{txt}' */
				$pagesraw = glob('../*.{php}', GLOB_BRACE);
				echo '<form method="post" action="pagecompose.php">';
				foreach ($pagesraw as $filename) {
					/* See note above regarding subdirectory and apply same rule to $path if necessary. */
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
					$unwanted[1] = '/menu/';
					$unwanted[2] = '/footer/';
					$rem = 'removeme';
					$remfiles = preg_replace($unwanted, $rem, $pagestrip);
					$listing = '<input type="submit" name="filename" value="' . $remfiles . '"><br>';
					if ($listing !== '<input type="submit" name="filename" value="removeme"><br>') {
						echo $listing; // Any value of "removeme" as defined by $unwanted ignored.
					}
				}
				echo '</form>';
				echo '<br>';
				echo '<h2>Edit Global Modules</h2>';
				echo '<p>Select page module to edit:</p>';
				$pagesraw = glob('../*.{php}', GLOB_BRACE);
				echo '<form method="post" action="editmodule.php">';
				foreach ($pagesraw as $filename) {
					/* See note above regarding subdirectory and apply same rule to $path if necessary. */
					$path = '../'; // Based on php files, to edit text file(s) for these pages.
					$pathreplace = '';
					$pagelist = str_replace($path, $pathreplace, $filename); // Pick out files.
					$pagestrip = substr_replace($pagelist, "", -4); // Remove ".php" for buttons.
					/* Define default desired page modules (included in every page of website). Not intended to be edited by end user, these files are permanent core components of the website structure. */
					$wanted = array();
					$wanted[0] = '/menu/';
					$wanted[1] = '/footer/';
					$open = 'openme';
					$openfiles = preg_replace($wanted, $open, $pagestrip);
					$listing = '<input type="submit" name="filename" value="' . $pagestrip . '"><br>';
					$openus = '<input type="submit" name="filename" value="' . $openfiles . '"><br>';
					if ($openus == '<input type="submit" name="filename" value="openme"><br>') {
						echo $listing; // This time we only want menu and footer.
					}
				}
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