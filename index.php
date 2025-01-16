<?php 
	# Stop Hacking attempt
	define('__APP__', TRUE);
	
	# Start session
    session_start();
	
	# Database connection
	include ("dbconn.php");
	
	# Variables MUST BE INTEGERS
    if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
	if(isset($_GET['action'])) { $action   = (int)$_GET['action']; }
	
	# Variables MUST BE STRINGS A-Z
    if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }
	
	if (!isset($menu)) { $menu = 1; }
	
	# Classes & Functions
    include_once("functions.php");
	
print '
<!DOCTYPE HTML>
<html lang="hr">
	<head>
		<title>Naslovnica</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="Luka Javor">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <link rel="stylesheet" href="stilovi.css">
	</head>
<body>
	<header>
		<div class="banner"></div>
		<nav>';
			include("menu.php");
		print '</nav>
	</header>
	<main>';
		if (isset($_SESSION['message'])) {
			print $_SESSION['message'];
			unset($_SESSION['message']);
		}
	
	# Homepage
	if (!isset($menu) || $menu == 1) { include("home.php"); }
	
	# News
	else if ($menu == 2) { include("news.php"); }
	
	# Contact
	else if ($menu == 3) { include("contact.php"); }
	
	# About us
	else if ($menu == 4) { include("about-us.php"); }
	
	# Register
	else if ($menu == 5) { include("register.php"); }
	
	# Signin
	else if ($menu == 6) { include("signin.php"); }
	
	# Admin webpage
	else if ($menu == 7) { include("admin.php"); }

    else if ($menu == 8) { include("galery.php"); }
	
	print '
	</main>
	<footer>
		<p>Copyright &copy; ' . date("Y") . ' Luka Javor <a href="https://github.com/LukaJavor?tab=repositories" target="_blank"><img src="images/GitHub-Mark-Light-32px.png" title="Github" alt="Github"></a></p>
	</footer>
</body>
</html>';
?>