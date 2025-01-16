<?php 
	print '
	<h1>Registriraj se:</h1>
	<div id="register">';
	
	if ($_POST['_action_'] == FALSE) {
		print '
		<form action="" id="registration_form" name="registration_form" method="POST">
			<input type="hidden" id="_action_" name="_action_" value="TRUE">
			
			<label for="fname">Ime *</label>
			<input type="text" id="fname" name="firstname" placeholder="Vaše ime.." required>

			<label for="lname">Prezime *</label>
			<input type="text" id="lname" name="lastname" placeholder="Vaše prezime.." required>
				
			<label for="email">E-mail *</label>
			<input type="email" id="email" name="email" placeholder="Vaš e-mail.." required>
			
            <label for="password">Lozinka:* <small>(Lozinka mora imati najmanje 4 znaka)</small></label>
			<input type="password" id="password" name="password" placeholder="Lozinka.." pattern=".{4,}" required>

			<label for="country">Država:</label>
			<select name="country" id="country">
				<option value="">molimo odaberite</option>';
				#Select all countries from database webprog, table countries
				$query  = "SELECT * FROM countries";
				$result = @mysqli_query($MySQL, $query);
				while($row = @mysqli_fetch_array($result)) {
					print '<option value="' . $row['country_code'] . '">' . $row['country_name'] . '</option>';
				}
			print '
			</select>

            <label for="city">Grad</label>
			<input type="text" id="city" name="city"  placeholder="Grad.." required><br>

            <label for="adress">Adresa</label>
			<input type="text" id="adress" name="adress"  placeholder="Adresa.." required><br>

            <label for="date">Datum rođenja</label>
			<input type="date" id="date" name="date" required><br>
			
			<input type="submit" value="Submit">
		</form>';
	}
	else if ($_POST['_action_'] == TRUE) {
		
		$query  = "SELECT * FROM users";
		$query .= " WHERE email='" .  $_POST['email'] . "'";
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if ($row['email'] == '') {
			# password_hash https://secure.php.net/manual/en/function.password-hash.php
			# password_hash() creates a new password hash using a strong one-way hashing algorithm
			$pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
			
			$query  = "INSERT INTO users (firstname, lastname, email, password, country, city, adress, date)";
			$query .= " VALUES ('" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['email'] . "', '" . $pass_hash . "', '" . $_POST['country'] . "', '" . $_POST['city'] . "', '" . $_POST['adress'] . "', '" . $_POST['date'] . "')";
			$result = @mysqli_query($MySQL, $query);
			
			# ucfirst() — Make a string's first character uppercase
			# strtolower() - Make a string lowercase
			echo '<p>' . ucfirst(strtolower($_POST['firstname'])) . ' ' .  ucfirst(strtolower($_POST['lastname'])) . ', thank you for registration </p>
			<hr>';
		}
		else {
			echo '<p>User with this email or username already exist!</p>';
		}
	}
	print '
	</div>';
?>