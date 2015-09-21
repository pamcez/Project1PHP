<?php  

class centre {

	private $model;
		public function __construct($model) {
		//assign class properties
		$this -> model = $model;
	}

	public function displayCentres() {
		$centres = $this -> model -> getCentres();
		
		$user = $_SESSION['userID'];
		
		$html .= '<h2>Wellington Region</h2>'."\n";
		$html .= '<table>'."\n";
		$html .= '<tr>'."\n";
		$html .= '<th class="whitefont">Rank</th>'."\n";
			if($this -> model -> checkUser()) {				
				$html .= '<th class="whitefont">Rate <br/>Now!</th>'."\n";			
			}	
		$html .= '<th class="whitefont">Childcare Name</th>'."\n";
		$html .= '<th class="whitefont">Address</th>'."\n";				
		$html .= '<th class="whitefont">Contact Details</th>'."\n";
			if($this -> model -> checkAdmin()) {				
				$html .= '<th class="whitefont">Admin</th>'."\n";			
			}			
		$html .= '</tr> '."\n";					

		if(is_array($centres)) {
			foreach ($centres as $centre) {							
				$html .= '<tr>'."\n";
				$html .= '<td>'. $centre['ranking'].'</td>'."\n"; //compute ranking

					if($this -> model -> checkUser()) {								
						$html .= '<td>';
						$html .= '<form method="post" action="'. $_SERVER['REQUEST_URI'] .'">';
						$html .= '<p><select name="rateValue" >';
						$html .= '<option name="rateValue" value="5" select="selected">5</option>';
						$html .= '<option name="rateValue" value="4">4</option>';
						$html .= '<option name="rateValue" value="3">3</option>';
						$html .= '<option name="rateValue" value="2">2</option>';
						$html .= '<option name="rateValue" value="1">1</option>';
						$html .= '</select>';
						$html .= '<input type="submit" name="submitRate" value"Send" class="green"></p>';

						$html .= '<input type="hidden" name="centreID" value="' . $centre['centreID'] . '" />' . "\n";
						$html .= '<input type="hidden" name="user" value="' . $user . '" />' . "\n";
						$html .= '</form>';	
						$html .= '</td>';					
					}
				$html .= '<td>'.$centre['centreName'].'</td>'."\n";
				$html .= '<td>'.$centre['location'].'</td>'."\n";				
				$html .= '<td><a href="mailto:'.$centre['description'].'">'.$centre['description'].'</a><br/>'."\n";
				$html .= ' Phone: '.$centre['phone'].'</td>'."\n";				
				$html .= '<input type="hidden" name="centreID" value="'.$centre['centreID'].'" />';

				
					if($this -> model -> checkAdmin()) {						
						$html .= '<td><a href="index.php?page=editCentre&amp;id='.$centre['centreID'].'">Edit<a/><br/>';
						$html .= '<a href="index.php?page=deleteCentre&amp;id='.$centre['centreID'].'">Delete<a/></td>';
												
					}
				$html .= '</tr>'."\n";	
			}
		} else {
			//error
			$html .= '<h1 class="redhead">404 NOT FOUND</h1>';
			$html .= '<h2>Error Document Not Found<br/> The requested resource could not be found <br/> but may be available again in the future. <br/> Subsequent requests by the client are permissible.';
			$html .= '</h2>';
		}
		$html .= '</table>';
		$html .= '</div>';

		return $html;
	}

	 public function addRate() {
	 	//get values from $_POST and store as normal values 
	 	extract($_POST);
		
		//Add the rating to the database
		$this -> model -> addNewRate();	
		
		return $html;	

	 }

	public function displayNewRanking() {
	$rated = $this -> model -> getRanking();
	//Array ( [centreID] => 1 [AVG(rank.ranking)] => 3.6667 [centreName] => Capital City Preschool )
	// centreName and AVG
		$html .= '<h3>New Ranking<h3>';			 
	 	$html .= '<p>'.$rated['centreName'].'with an'."\n";		
	 	$html .= ' Overall Ranking of '.$rated['AVG(rank.ranking)'].'</p>'."\n";		

		return $html;
	}	
}


?>