<?php 

class user {

	public function __construct($model){
 		$this -> model = $model; 
 	}

 	public function displayUserPage() {
    //redirect if nobody is logged on.
	 if(!isset($_SESSION['userID'])) {
	 	//redirect
	 	header('Location:index.php?page=home');
	 }	
		if(!isset($_POST['logout'])) {

			$html = '<h2 class="redhead">' . $_SESSION['firstName'] .' Page <br/> Welcome to your Account!</h2>'; 
				
			$html .= '<div class="left half"><h3>Start Rating Childcare Centres Now!</h3><p>The system of rating uses averaging.  The parents rates the center with 5 as the highest and 1 is the lowest.  The Centre with the highest score is ranked as no. 1 and so forth. </p>';	
		
			$html .= '<form method="POST" action="'. $_SERVER['REQUEST_URI'] .'" class="left">';
			$html .= '<input type="submit" name="logout" value="Logout" class="blue whitefont">';
			$html .= '</form> </div><br/>';			

			return $html;		 					
		} else {
				$this -> model -> processLogout();					
				header('Location:index.php?page=login');
		}
			
	}


 	public function displayAdminPage() {
	    //redirect if nobody is logged on.
		 if(!isset($_SESSION['userID'])) {
		 	//redirect
		 	header('Location:index.php?page=home');
		 }	
		 if(!isset($_POST['logout'])) {
			$html = '<h2 class="redhead">' . $_SESSION['firstName'] .' Page <br/> Welcome to your Account!</h2>';	

			return $html;		 					
		} else {
				$this -> model -> processLogout();					
				header('Location:index.php?page=login');
		}
	} 


}

?>