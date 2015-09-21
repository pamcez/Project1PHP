<?php 
//removes notice messages from PHP internal compiler
error_reporting(E_ALL ^ E_NOTICE); //!! remove hashes on final site



// Begin the session
session_start();
session_regenerate_id(true);

// include common files
include('views/viewClass.php');
include('classes/modelClass.php');

// Instantiate the model class (this will, by extension, connect to the database)
$model = new model();

// Determine what page we are on. If no page specified, set it to home
if(isset($_GET['page'])) {
	// If login or logout, set the page to admin
	if($_GET['page'] == 'logout') {
		$page = 'login';
	} else {
		$page = $_GET['page'];
	}
} else {
	$page = 'home';
}


// Get page info from database
$pageInfo = $model -> getPageInfo($page);
// If no page found, we should quit
if(!$pageInfo) {
	header('HTTP/1.0 404 Not Found');
	die('Page not found!');
}

	// Create the appropriate view based on the value of $page
	switch($page) {
		// EG: If the page is 'home', instantiate the 
		//'home view' class and send it the page info and model
		case 'home':
			include('views/homeView.php');
			new home($pageInfo, $model);
			break;
		case 'about':
			include('views/aboutView.php');
			new about($pageInfo, $model);
			break;	
		case 'directory':
			include('views/directoryView.php');
			new childcareDirectory($pageInfo, $model);
			break;	
		case 'centre':
			include('views/centreView.php');
			new centreView($pageInfo, $model);
			break;
		case 'admin':
			include('views/adminView.php');
			new adminView($pageInfo, $model);
			break;
		case 'articles':
			include('views/articleView.php');
			new articles($pageInfo, $model);
			break;
		case 'sign':
			include('views/signUpView.php');
			new sign($pageInfo, $model);
			break;
		case 'login':
			include('views/loginView.php');
			new login($pageInfo, $model);
			break;	
		case 'first':
			include('views/firstRankedView.php');
			new first($pageInfo, $model);
			break;
		case 'user':
			include('views/userView.php');
			new userView($pageInfo, $model);
			break;	
		case 'contact':
			include('views/contactView.php');
			new contact($pageInfo, $model);
			break;	
		case 'sitemap':
			include('views/sitemapView.php');
			new sitemap($pageInfo, $model);
			break;
		case 'deleteCentre':
			include('views/deleteCentreView.php');
			new deleteCentre($pageInfo, $model);
		    break;
		case 'editCentre':
			include('views/editCentreView.php');
			new editCentre($pageInfo, $model);		
			break;
	}// end switch


 ?>