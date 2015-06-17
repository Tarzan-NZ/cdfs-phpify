<div class="columns">
	<form method="POST" action="index.php?page=login">
		<div class="medium-6 columns">	
			<label>Username: </label>
			<input type="text" placeholder="Username" name="username" value="<?php echo $this->userName; ?>">
			<?php 

			function errorMessage($message) {
				if($message != '' ) {
					echo '<small class="error">';
					echo $message;
					echo "</small>";
				}
			}

			errorMessage($this->usernameError);
			
			?>
		</div>
	<div class="medium-6 columns">
		<label>Password: </label>
		<input type="password" name="password">
		<?php 
		errorMessage($this->passwordError);
		?>
	</div>
		<div class="columns">
			<input type="submit" value="Login">
			<?php errorMessage($this->loginError); ?>
	
		</div>
	</form>
</div>