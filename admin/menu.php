<!-- Menu navigation content -->
<a href="settings.php">Settings</a>
&nbsp;
&nbsp;
<a href="pages.php">Pages</a>
&nbsp;
&nbsp;
<a href="themes.php">Themes</a>
&nbsp;
&nbsp;
<?php
	/* Only show log out option if the user is logged in */
	session_start();
	if (isset($_SESSION['login'])) {
		echo '<div id="logout"><a href="logout.php">Logout</a></div>' . "\n";
	}
?>