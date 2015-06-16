<?php

class LoginModel extends Model {

	public function attemptLogin() {
		
		// Extract from the Post array
		$username = $_POST['username'];
		$password = $_POST['password'];

		// Filter ther username
		$username =$this->dbc->real_escape_string($username);

		// Prep the SQL
		$sql = "SELECT Password, Privilege FROM accounts WHERE Username = '$username' ";
		
		// Run the SQL
		$result = $this->dbc->query($sql);

		// Make sure there is a result
		if ($result->num_rows == 0 ) {
			return;
		}

		// Extract the data from the result
		$data = $result->fetch_assoc();

		// Use the password compat library
		require 'vendor/password.php';

		// Compare the pasword
		if( password_verify( $password, $data['Password'] ) ) {

			// Credentials are correct
			$_SESSION['username'] = $username;
			$_SESSION['privilege'] = $data['Privilege'];

			// Redirect the user to their account page
			header('Location: index.php?page=account');


		}

		// Find an account with

	}

}