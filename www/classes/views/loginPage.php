<?php

class LoginPage extends Page {

	// Properties
	private $usernameError;
	private $passwordError;
	private $loginError;
	private $userName;

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

		// Save the login username
		$this->userName = trim($_POST['username']);

		// Validate the form before attempting to log in
		if (trim($_POST['username']) == '' ) {
			$this->usernameError = '* Required';
		}

		if (($_POST['password']) == '') {
			$this->passwordError = '* Required';
		}

		// If there are no errors
		if ($this->passwordError = '' && $this->usernameError == '') {			
			// Use the model to check if the user has the right recentials
			$this->model->attemptLogin();

			// If this code runs then the user was not redirected
			// Therefore they did not have correct login credentials
			$this->loginError = 'Username or password incorrect';
		}

		
	}

}