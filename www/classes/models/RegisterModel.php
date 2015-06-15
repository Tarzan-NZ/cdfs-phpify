<?php

class RegisterModel extends Model {

	public function checkIfUsernameExists($username) {
		
		// Filter the username in case it has malicious code
		$username = $this->dbc->real_escape_string( $username );

		// Prepare SQL Query
		$sql = "SELECT Username FROM accounts WHERE Username = '$username'";

		// Run the SQL
		$result = $this->dbc->query($sql);

		// If there is a result
		if ($result->num_rows > 0) {
			
			return true;
		} else {
			return false;
		}

	}


	public function checkIfEmailExists($email) {
		
		// Filter the email for malicious code
		$email = $this->dbc->real_escape_string( $email );

		// Prep the SQL query
		$sql = "SELECT Email FROM Accounts WHERE Email = '$email' ";

		// Run the SQL
		$result = $this->dbc->query($sql);

		// Check to see if there is anything inside that result
		return $result->num_rows ? true : false;
	}

	public function registerNewAccount( $username, $email, $password) {
		
		// Filter the data 
		$username = $this->dbc->real_escape_string( $username );
		$email 	  = $this->dbc->real_escape_string( $email );
	

		// Hash the password
		require 'vendor/password.php';

		$hashedPassword = password_hash( $password, PASSWORD_BCRYPT );

		$sql = "INSERT INTO accounts 
				VALUES (NULL, '$username','$email','$hashedPassword','user', CURRENT_TIMESTAMP)";

		// Run the sql
		$this->dbc->query($sql);

		// Log the user in by saving their details into a session
		$_SESSION['username'] = $username;
		$_SESSION['Privilege'] = 'user';


	
	}

}