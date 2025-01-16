<?php 
	if ($_SESSION['user']['valid'] == 'true' && $_SESSION['user']['role'] == 'admin') {
		if (!isset($action)) { $action = 1; }
		print '
		<h1>Administracija</h1>
		<div id="admin" >
			<ul >
				<li><a style="color:white;text-decoration:none" href="index.php?menu=7&amp;action=1">Korisnici</a></li>
				<li><a style="color:white;text-decoration:none" href="index.php?menu=7&amp;action=2">Vijesti</a></li>
			</ul>';
			# Admin Users
			if ($action == 1) { include("admin/users.php"); }
			
			# Admin News
			else if ($action == 2) { include("admin/news.php"); }
		print '
		</div>';
	}

	elseif ($_SESSION['user']['valid'] == 'true' && $_SESSION['user']['role'] == 'editor') {
		if (!isset($action)) { $action = 2; }
		print '
		<h1>Administracija</h1>
		<div id="admin" >
			<ul >
				<li><a style="color:white;text-decoration:none" href="index.php?menu=7&amp;action=2">Vijesti</a></li>
			</ul>';
			# Admin Users
			if ($action == 1) { include("admin/users.php"); }
			
			# Admin News
			else if ($action == 2) { include("admin/news.php"); }
		print '
		</div>';
	}
	elseif ($_SESSION['user']['valid'] == 'true' && $_SESSION['user']['role'] == 'user') {
		print '
		<h1>Administracija</h1>
		<div id="admin" >
			<p>Nemate pravo pristupa administraciji.</p>';
		print '
		</div>';
	}
	else {
		$_SESSION['message'] = '<p>Please register or login using your credentials!</p>';
		header("Location: index.php?menu=6");
	}

?>