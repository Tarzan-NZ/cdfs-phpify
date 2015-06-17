<div class="row">
	<div class="columns">
		<form>
			<label>User: </label>
			<select>
				</select><?php

				// Use the Model to get all the accounts
				$result = $this->model->getAllUsernames();


				// Loop through the result and display all the usernames
				while( $row = $result->fetch_assoc() ) {
					echo "<option>".$row['Username']."<option>";
				}
					
				

				?>
			</select>
		</form>
	</div>
</div>