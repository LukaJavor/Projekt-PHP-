<?php 
	print '
	<h1>Prijava:</h1>
	<div id="signin">';
	
	if ($_POST['_action_'] == FALSE) {
		print '
		<form action="" name="myForm" id="myForm" method="POST">
			<input type="hidden" id="_action_" name="_action_" value="TRUE">

			<label for="email">E-mail:*</label>
			<input type="text" id="email" name="email" value="" required>
									
			<label for="password">Lozinka:*</label>
			<input type="password" id="password" name="password" value="" pattern=".{4,}" required>
									
			<input type="submit" value="Submit">
		</form>';
	}
	else if ($_POST['_action_'] == TRUE) {
		
		$query  = "SELECT * FROM users";
		$query .= " WHERE email='" .  $_POST['email'] . "'";
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if (password_verify($_POST['password'], $row['password'])) {
			#password_verify https://secure.php.net/manual/en/function.password-verify.php
			$_SESSION['user']['valid'] = 'true';
			$_SESSION['user']['id'] = $row['id'];
			$_SESSION['user']['firstname'] = $row['firstname'];
			$_SESSION['user']['lastname'] = $row['lastname'];
			$_SESSION['user']['role'] = $row['role'];
			$_SESSION['message'] = '<p>Dobrodošli, ' . $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'] . '</p>';
			
			# Redirect to admin website
			header("Location: index.php?menu=7");
			
			
		}
		
		# Bad username or password
		else {
			unset($_SESSION['user']);
			$_SESSION['message'] = '<p>Unijeli ste krivi email ili lozinku!</p>';
			header("Location: index.php?menu=6");
		}
	}
	print '
	</div>';
?>