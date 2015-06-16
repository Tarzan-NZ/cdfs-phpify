<?php

class LoginPage extends Page {

	public function __construct($model) {
		parent::__construct($model);

		// If the user has submitted the from
		if (isset($_POST['username']) ) {
			

			// Process the login form
			$this->processLoginForm();
		}
	}

	public function contentHTML() {
		include 'templates/loginpage.php';
	}

	public function processLoginForm() {
		$this->model->attemptLogin();
	}

}