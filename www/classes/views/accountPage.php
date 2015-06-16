<?php

class AccountPage extends Page {

	public function contentHTML() {

		// Make sure the user is logged in 
		// If not tell them to login or register
		if ( !isset($_SESSION['username']) ) {
			echo "You need to be logged in";
			return;
		}
		
		include 'templates/account.php';

		// If the user is an admin
		if ($_SESSION['privilege'] == 'admin') {

			include 'templates/adminhome.php';
		}

	}

}