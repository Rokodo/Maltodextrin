<!-- Menu navigation content -->
<?php
	$pagesraw = glob('*.{php}', GLOB_BRACE);
	foreach ($pagesraw as $pages) {
		$path = '/';
		$pathreplace = '';
		$pagelist = str_replace($path, $pathreplace, $pages);
		$pagestrip = substr_replace($pagelist, "", -4); // Remove ".php" for link.
		$index = '/index/';
		$home = 'home'; 
		$underscore = '/_/';
		$space = ' ';
		$homefix1= preg_replace($index, $home, $pagestrip); // Replaces "index" link text with "home".
		$homefix2 = preg_replace($underscore, $space, $homefix1); // Replaces '_' from file names with space.
		$finalfix = ucwords(strtolower($homefix2)); // Upper case first letters in each word for menu links.
		/* Define files you don't want to be shown in the navigation menu by editing/adding to the $unwanted array. */
		$unwanted = array();
		$unwanted[0] = '/footer/';
		$unwanted[1] = '/menu/';
		$unwanted[2] = '/500/'; // Put your 404 page here if you have one. 
		$unwanted[3] = '/donationthanks/';
		$rem = 'removeme';
		$remfiles = preg_replace($unwanted, $rem, $pagestrip);
		/* Open page and find out title. */
		$listing = '<a href="' . $pagelist . '">' . $finalfix . '</a>&nbsp;&nbsp;';
		$remtest = '<a href="' . $pagelist . '">' . $remfiles . '</a>&nbsp;&nbsp;';
		if (!($remtest == '<a href="' . $pagelist . '">removeme</a>&nbsp;&nbsp;')) {
			echo $listing; // Any value of "removeme" as defined by $unwanted ignored.
		}
	}
?>