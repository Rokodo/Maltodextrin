<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="style/admin.css">
	<title>Maltodextrin Control Panel &#45; Pages</title>
</head>

<body>
	<div id="nav">
		<?php include 'menu.php'; ?>
	</div>
	<div id="body">
		<?php
			mb_internal_encoding("UTF-8");
			if (isset($_SESSION['login'])) {
				if (!$_POST) {
					header('Location: pages.php');
				}
				echo '<h1>Create a New Page</h1>';
				echo '<form method="post" action="writepage.php">';
				$hyphen = '&#45;'; // This will be used in writing the page to a php file.
				$webtitle = file_get_contents('../webtitle.txt'); // Get website title/name.
				echo ' <input type="text" name="ptitle" value="Page Title (Browser Tab)">' . "\n";
				echo '<br>';
				echo '<input type="text" name="mname" value="Navigation Menu Name (On Website) - Usually this should match the Page Title above">' . "\n";
				echo '<br>';
				echo '<textarea name="editor" rows="20" cols="1">';
				echo '<h1>Start writing your page here.</h1>' . "\n\n";
				echo '<p>' . "\n";
				echo 'Example paragraph.' . "\n";
				echo '</p>' . "\n\n";
				echo '<p>' . "\n";
				echo 'You do not need to worry about anything but the main content, i.e. headings, paragraphs and text or image links (as well as image embedding). Other page structure is taken care of by Maltodextrin when you click Create Page below and your page will be seamlessly integrated into the website. This is to simplify the difficulty of keeping the document HTML5 valid for you, the user. In future it is hoped that this interface will be developed to become [even more] user friendly.' . "\n";
				echo '</p>';
				echo '</textarea>';
				echo '<br>';
				echo '<input type="submit" name="save" value="Create Page">';
				echo '</form>';				
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