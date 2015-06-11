<?php

class Model {

	// Properties
	protected $dbc;
	public $title;
	public $description;

	// Constructor
	public function __construct() {
		// Connect to the database
		$this->dbc = new mysqli('localhost','root', '', 'cheapo');
	
	}

	// Methods (funtions)
	//Get page info
	public function getPageInfo() {
		// supply page Title & Description
		$requestedPage = $_GET['page'];

		// Write the SQL query to be run
		$sql = "SELECT Title, Description FROM pages WHERE Name = '$requestedPage'";

		// Then actually run the SQL query
		$result = $this->dbc->query( $sql );

		// Make sure there is data in the result
		// if not then we need to get the 404 page data instead
		if ($result->num_rows == 0 ) {
			
			// Pepare the SQL to get the 404 data 
			$sql = "SELECT Title, Description FROM pages WHERE Name = '404'";

			// Capture the result
			$result = $this->dbc->query( $sql );
		}

		// Convert 
		$pageData = $result->fetch_assoc();

		$this->title 		= $pageData['Title'];
		$this->description 	= $pageData['Description'];

	}


}