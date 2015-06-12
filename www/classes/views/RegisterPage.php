<?php 

class RegisterPage extends Page {

	// proerties
	private $userNameError;
	private $userName;

	public function contentHTML() {
		include 'templates/registerform.php';
	}

	public function __construct($model) {
		// Use the parent constructor
		parent::__construct($model);

		// If the register form has been submitted
		if (isset($_POST['register-account'])) {
			
			// User has submitted the form
			$this->processNewAccount();
		}
	}

	public function processNewAccount()	{
		
		// Make life easier
		$uName = trim($_POST['username']);

		// Save the username so it stay after validation attempts (sticky)
		$this->userName = $uName;

		// Validation
		// Username first
		if ($uName == '') {
			$this->userNameError ='* Required';
		} elseif($this->model->checkIfUsernameExists($uName)) {
			$this->userNameError = 'Username already in use try a different username';
		}


	}

}