<?php 
	
	# Update user profile
	if (isset($_POST['edit']) && $_POST['_action_'] == 'TRUE') {
		$query  = "UPDATE users SET firstname='" . $_POST['firstname'] . "', lastname='" . $_POST['lastname'] . "', email='" . $_POST['email'] . "', country='" . $_POST['country'] . "', city='" . $_POST['city'] . "', adress='" . $_POST['adress'] . "', date='" . $_POST['date'] . "', role='" . $_POST['role'] . "'";
        $query .= " WHERE id=" . (int)$_POST['edit'];
        $query .= " LIMIT 1";
        $result = @mysqli_query($MySQL, $query);
		# Close MySQL connection
		@mysqli_close($MySQL);
		
		$_SESSION['message'] = '<p>You successfully changed user profile!</p>';
		
		# Redirect
		header("Location: index.php?menu=7&action=1");
	}
	# End update user profile
	
	# Delete user profile
	if (isset($_GET['delete']) && $_GET['delete'] != '') {
	
		$query  = "DELETE FROM users";
		$query .= " WHERE id=".(int)$_GET['delete'];
		$query .= " LIMIT 1";
		$result = @mysqli_query($MySQL, $query);

		$_SESSION['message'] = '<p>You successfully deleted user profile!</p>';
		
		# Redirect
		header("Location: index.php?menu=7&action=1");
	}
	# End delete user profile
	
	
	#Show user info
	if (isset($_GET['id']) && $_GET['id'] != '') {
		$query  = "SELECT * FROM users";
		$query .= " WHERE id=".$_GET['id'];
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result);
		print '
		<h2>Profil</h2>
		<p><b>Ime:</b> ' . $row['firstname'] . '</p>
		<p><b>Prezime:</b> ' . $row['lastname'] . '</p>';
		$_query  = "SELECT * FROM countries";
		$_query .= " WHERE country_code='" . $row['country'] . "'";
		$_result = @mysqli_query($MySQL, $_query);
		$_row = @mysqli_fetch_array($_result);
		print '
		<p><b>Država:</b> ' .$_row['country_name'] . '</p>
        <p><b>Grad:</b> ' .$row['city'] . '</p>
		<p><b>Adresa:</b> ' .$row['adress'] . '</p>
        <p><b>Datum rođenja:</b> ' .$row['date'] . '</p>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Natrag</a></p>';
	}
	#Edit user profile
	else if (isset($_GET['edit']) && $_GET['edit'] != '') {
		$query  = "SELECT * FROM users";
		$query .= " WHERE id=".$_GET['edit'];
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result);
		$checked_archive = false;
		
		print '
		<h2>Uredi profil</h2>
		<form action="" id="registration_form" name="registration_form" method="POST">
			<input type="hidden" id="_action_" name="_action_" value="TRUE">
			<input type="hidden" id="edit" name="edit" value="' . $_GET['edit'] . '">
			
			<label for="fname">Ime *</label>
			<input type="text" id="fname" name="firstname" value="' . $row['firstname'] . '" placeholder="Vaše ime.." required>

			<label for="lname">Prezime *</label>
			<input type="text" id="lname" name="lastname" value="' . $row['lastname'] . '" placeholder="Vaše prezime.." required>
				
			<label for="email">E-mail *</label>
			<input type="email" id="email" name="email"  value="' . $row['email'] . '" placeholder="Vaš e-mail.." required>
			
			
			<label for="country">Država</label>
			<select name="country" id="country">
				<option value="">molimo odaberite</option>';
				#Select all countries from database webprog, table countries
				$_query  = "SELECT * FROM countries";
				$_result = @mysqli_query($MySQL, $_query);
				while($_row = @mysqli_fetch_array($_result)) {
					print '<option value="' . $_row['country_code'] . '"';
					if ($row['country'] == $_row['country_code']) { print ' selected'; }
					print '>' . $_row['country_name'] . '</option>';
				}
			print '
			</select>
			
			<label for="city">Grad</label>
			<input type="text" id="city" name="city"  placeholder="Grad.." required><br>

            <label for="adress">Adresa</label>
			<input type="text" id="adress" name="adress"  placeholder="Adresa.." required><br>

            <label for="date">Datum rođenja</label>
			<input type="date" id="date" name="date" required><br>
			
			<label for="adress">Role:</label>
			<input type="text" id="role" name="role"  placeholder="role" required><br>
			<hr>
			
			<input type="submit" value="Submit">
		</form>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Natrag</a></p>';
	}
	else {
		print '
		<h2>Popis korisnika</h2>
		<div id="users">
			<table style="width:100%;border-collapse: collapse;">
				<thead>
					<tr>
						<th style="border: 1px solid #ddd;padding: 8px;" width="16"></th>
						<th style="border: 1px solid #ddd;padding: 8px;" width="16"></th>
						<th style="border: 1px solid #ddd;padding: 8px;" width="16"></th>
						<th style="border: 1px solid #ddd;padding: 8px;">Ime</th>
						<th style="border: 1px solid #ddd;padding: 8px;">Prezime</th>
						<th style="border: 1px solid #ddd;padding: 8px;">E mail</th>
						<th style="border: 1px solid #ddd;padding: 8px;">Država</th>
                        <th style="border: 1px solid #ddd;padding: 8px;">Grad</th>
                        <th style="border: 1px solid #ddd;padding: 8px;">Adresa</th>
                        <th style="border: 1px solid #ddd;padding: 8px;">Datum rođenja</th>
						<th style="border: 1px solid #ddd;padding: 8px;">Role</th>
					</tr>
				</thead>
				<tbody>';
				$query  = "SELECT * FROM users";
				$result = @mysqli_query($MySQL, $query);
				while($row = @mysqli_fetch_array($result)) {
					print '
					<tr>
						<td style="border: 1px solid #ddd;padding: 8px;"><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;id=' .$row['id']. '"><img src="admin/images/user.png" alt="user"></a></td>
						<td style="border: 1px solid #ddd;padding: 8px;"><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;edit=' .$row['id']. '"><img src="admin/images/edit.png" alt="uredi"></a></td>
						<td style="border: 1px solid #ddd;padding: 8px;"><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;delete=' .$row['id']. '"><img src="admin/images/delete.png" alt="obriši"></a></td>
						<td style="border: 1px solid #ddd;padding: 8px;"><strong>' . $row['firstname'] . '</strong></td>
						<td style="border: 1px solid #ddd;padding: 8px;"><strong>' . $row['lastname'] . '</strong></td>
						<td style="border: 1px solid #ddd;padding: 8px;">' . $row['email'] . '</td>
						<td style="border: 1px solid #ddd;padding: 8px;">';
							$_query  = "SELECT * FROM countries";
							$_query .= " WHERE country_code='" . $row['country'] . "'";
							$_result = @mysqli_query($MySQL, $_query);
							$_row = @mysqli_fetch_array($_result, MYSQLI_ASSOC);
							print $_row['country_name'] . '
						</td>
						<td style="border: 1px solid #ddd;padding: 8px;">' . $row['city'] . '</td>
                        <td style="border: 1px solid #ddd;padding: 8px;">' . $row['adress'] . '</td>
                        <td style="border: 1px solid #ddd;padding: 8px;">' . $row['date'] . '</td>
						<td style="border: 1px solid #ddd;padding: 8px;">' . $row['role'] . '</td>
					</tr>';
				}
			print '
				</tbody>
			</table>
		</div>';
	}
	
	# Close MySQL connection
	@mysqli_close($MySQL);
?>