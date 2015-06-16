<?php 

class RegisterPage extends Page {

	// proerties
	private $userNameError;
	private $userName;
	private $email;
	private $emailError;
	private $passwordError;
	
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
		$email = trim($_POST['email']);
		$pass  = ($_POST['password']);
		$pass2 = ($_POST['password2']);

		// Save the username so it stay after validation attempts (sticky)
		$this->userName = $uName;
		$this->email 	= $email;

		// Validation
		// Username first
		if( strlen($uName) > 20 || strlen($uName) < 3 ) {
			$this->userNameError = 'Username has to be between 3 & 20 characters';
		} elseif( !preg_match('/^[a-zA-Z0-9_\-.]{3,20}$/', $uName ) ) {
			$this->userNameError = 'Username can only include a-z,0-9, periods(.)Hyphens(-) & Underscores(_)';
		} elseif($this->model->checkIfUsernameExists($uName)) {
			$this->userNameError = 'Username already in use try a different username';
		}

		// Validate the email
		if ( strlen($email) < 6 || strlen($email) > 254 ) {
			$this->emailError = 'Email is not a valid length';
		} elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
			$this->emailError = 'Invalid email format, email format is example@example.com';
		} elseif ( $this->model->checkIfEmailExists($email) ) {
			$this->emailError = 'Email already in use try a different email';
		}

		if ( strlen($pass) < 8) {
			$this->passwordError = 'Passwords must be at least 8 characters';
		} elseif ($pass != $pass2) {
			$this->emailError = 'Passwords do not match';
		}

		// If there are no errors, then create the account 
		if ($this->userNameError == '' && $this->emailError == '' && $this->passwordError == '') {
			$this->model->registerNewAccount($uName, $email, $pass);

			// Redirect the user if they succeed in creating an account
			header('Location: index.php?page=account');

		}


	}

}