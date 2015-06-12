<?php

class RegisterModel extends Model {

	public function checkIfUsernameExists($username) {
		
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

}