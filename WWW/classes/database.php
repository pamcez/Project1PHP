<?php 
include('../config.php'); //access to database

class database {
	//declare class property
	private $dbc;// database connection object

	public function __construct() {
		//assign class property values
		//secure connection

		try {			
			$this -> dbc = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
			if (mysqli_connect_errno()) {
				throw new Exception('Database Connection Failed');				
			}
		} catch(Exception $e) {
			die($e -> getMessage());
		}
	}

	protected function checkLogin() {
		extract($_POST);
		// Hash the password that was entered into the form (if it was correct, it will match the hashed password in the database)
		$password = sha1($password);
		// Query
		$query = "SELECT userID, username, firstName, access FROM users WHERE username='$username' AND password='$password'";
		$data = $this -> single_select_query($query);
		return $data;
	}
	
	
	protected function checkSignUp() {
		extract($_POST);
		// Hash the password that was entered into the form (if it was correct, it will match the hashed password in the database)
		$password = sha1($password);
		// Query
		$query = "SELECT username, access FROM users WHERE username='$username' AND password='$password'";
		$data = $this -> single_select_query($query);
		return $data;
	}

	//QUERY PROCESSING
	public function getPageInfo($page) {
		$query = "SELECT page, title, heading, description, content FROM pages WHERE page='$page'";
		$data = $this -> single_select_query($query);
		return $data;
	}
	
	public function getCentre($centreID) {
		$query = "SELECT centreName, description, phone, location, ranking, rate FROM centreProfile WHERE centreID='$centreID'";
		$data = $this -> single_select_query($query);
		return $data;
	}

	public function getCentres() {
		$query = "SELECT centreID, centreName, description, phone, location, ranking, rate FROM centreProfile";
		$result = $this -> dbc -> query($query);
		
		if (!$result) {
			$html .= '<h3>Error</h3>';
		} else {
			if ($result -> num_rows > 0) {
				$centres = array();
				while($row = $result -> fetch_assoc()) {
					$centres[] = $row;
				}
				return $centres;
			} else {
				return false;
			}
			
		}
		return $data;
	}

	public function getFirst(){
		$query = "SELECT centreID, centreName, description, phone, location, ranking, rate FROM centreProfile WHERE ranking='1'";
		$data = $this -> single_select_query($query);
		return $data;
	}

	public function sanitize() {
		//get the editCentre form data in the form of key = value (form name = form input)
		extract($_POST);
		//query
		if(!get_magic_quotes_gpc()) {
			$centreName = $this -> dbc -> real_escape_string($centreName);
			$description = $this -> dbc -> real_escape_string($description);
		}

	}	

	public function addUserToDatabase() {
		extract($_POST);
		$password = sha1($password);
		//query
		$query = "INSERT INTO users VALUES(NULL, '$username' , '$password', 'user', '$firstName')";
		$data  = $this -> affected_query($query);
		return $data;		
	}

	public function addCentreToDatabase() {
		extract($_POST);
		
		//query
		$query = "INSERT INTO centreProfile VALUES(NULL, '$centreName' , '$description', '$location', '$phone', '$rankID', '$rate')";
		$data  = $this -> affected_query($query);
		return $data;		
	}

	public function postCentreToDatabase() {
		extract($_POST);
		
		//query
		$query = "INSERT INTO centreProfile VALUES(NULL, '$centreName' , '$description', '$location', '$phone', '$rankID', '$rate')";
		$data  = $this -> affected_query($query);
		return $data;	
	}

	public function editCentre() {		
		extract($_POST);
		//query
		if(!get_magic_quotes_gpc()) {
			$centreName = $this -> dbc -> real_escape_string($centreName);
			$description = $this -> dbc -> real_escape_string($description);
		}
		
		$query = "UPDATE centreProfile SET centreName='$centreName', description='$description', location='$location', phone='$phone', ranking='$ranking', rate='$rate' WHERE centreID='$centreID' ";
		$data = $this -> affected_query($query);
		return $data;
	}	
	
	public function deleteFromDatabase() {
		$centreID = $_GET['id'];
		$query = "DELETE FROM centreProfile WHERE centreID='$centreID'";
		$data = $this -> affected_query($query);
		return $data;
	}
	
	public function addNewRate() {	
		//Filter values
		 //$rank = $this -> sanitize($_POST['ranking']);
		// $rateValue = $this -> sanitize($rank);
		 $ranking = $_POST['rateValue'];
		 $centreID = $_POST['centreID'];
		 $user = $_POST['user'];		
		//query
		//$query = "INSERT INTO rank VALUES(NULL, '$rank', '$rateValue','$centreID', '$user')";
		$query = "INSERT INTO rank VALUES(NULL, '$ranking','$centreID', '$user')";
		$data  = $this -> affected_query($query);
		return $data;
	 }
	
	public function postRankToDatabase() {
		$centreID = $_GET['id'];
		//$query = "INSERT INTO rank VALUES(NULL, '$rank => $_POST['rateValue']','$centreID => $_POST['centreID']', '$user => $_POST['user']')";
		$query = "INSERT INTO `rank` VALUES(NULL, `$rateValue`, `$centreID`, `$userID`)";
		
		$data  = $this -> affected_query($query);
		return $data;
	} 
	 
	 public function getRanking() {
	 	 $centreID = $_POST['centreID'];

	 	 $query = "SELECT rank.centreID, AVG(rank.ranking), centreName FROM rank JOIN centreProfile ON centreProfile.centreID = rank.centreID GROUP BY centreID";	 	
	 	 $data = $this -> single_select_query($query);
		 return $data;

	 }	
	
	public function countCentres() {
		$query = "SELECT COUNT(centreID) AS TotalCentres FROM centreProfile";
		$result = $this -> dbc -> query($query);
		$resultAsAssoc = $result->fetch_assoc();
		//get the value
		$TotalCentres = $resultAsAssoc['totalCentres'];

		//Total results from page
		$resultsPerPage = 2;
	}
	
	public function checkCentre() {
		extract($_POST);		
		// Query
		$query = "SELECT `centreID`, `centreName`, `description`, `location`, `phone`, `ranking`, `rate` FROM `centreProfile`";

		$data = $this -> single_select_query($query);
		return $data;
	}

	/*QUERY FUNCTION PROCESSING*/
	private function single_select_query($query) {
		$result = $this -> dbc -> query($query);
		if(!$result) {
			echo "Query Error";
		} else {
			if ($result -> num_rows > 0) {
				$data = $result -> fetch_assoc();
				return $data;
			} else {
				return false;
			}
		}
		return $data;
	}// end single_select_query

	//This function will return a query result - either true or false (affected or not) 
	//this function also holds the operation to add, insert and delete rows within the database
	public function affected_query($query) {
		//run the query
		$result = $this -> dbc -> query($query);
		//test the query
		if(!$result) {
			echo "Query Error";
		} else {
			if($this -> dbc -> affected_rows > 0) {
				return true;
			} else {
				return false;
			}
		}
	}

}// end of class database

?>	