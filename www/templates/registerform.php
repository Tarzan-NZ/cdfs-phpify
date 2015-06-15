<div class="row">
	<div class="columns">
		<form novalidate method="POST" action="index.php?page=register">
			<h2>Register a student deals account</h2>

			<div>
				<label for="username">Username: </label>
				<input type="text" name="username" id="" placeholder="Blarg" value="<?php echo $this->userName; ?>">
				<?php

					function errorMessage($message) {
						if($message != '' ) {
							echo '<small class="error">';
							echo $message;
							echo "</small>";
						}
					}

					// If there is an error
				// if ($this->userNameError != '') {
				// 	echo '<small class="error">';
				// 	echo $this->userNameError;
				// 	echo "</small>";
				// }
					errorMessage($this->userNameError);
				?>
			</div>

			<div>
				<label for="email">Email Address: </label>
				<input type="email" name="email" id="" placeholder="Blarg@gmail.com" value="<?php echo $this->email; ?>">
				<?php errorMessage($this->emailError);?>
			</div>

			<div>
				<label for="password">Password: </label>
				<input type="password" name="password" id="">
			</div>

			<div>
				<label for="password2">Confirm Password: </label>
				<input type="password" name="password2" id="">
				<?php errorMessage($this->passwordError);?>
			</div>

			<input type="submit" class="button small" value="Register" name="register-account">

		</form>
	</div>
</div>