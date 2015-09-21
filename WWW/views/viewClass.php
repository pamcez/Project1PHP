<?php 

abstract class view {
	
	protected $pageInfo;
	protected $model;

	// Receive page info and the model object
	public function __construct($info, $model) {

		// Assign received values to class properties
		$this -> pageInfo = $info;
		$this -> model = $model;		
		// Run the function responsible for building the page
		$this -> displayPage();
		
	}

		// This function will build the page by calling 3 functions
	protected function displayPage() {
		$html = $this -> displayHeader();
		$html .= $this -> displayContent();	// Defined in a sub class
		$html .= $this -> displayFooter();
		echo $html;
	}	

// This function generates all HTML up to the page-specific content
	private function displayHeader() {
		// Page head
		$html = '<!DOCTYPE html>' . "\n";
		$html .= '<html>' . "\n";
		$html .= '<head>' . "\n";
		$html .= '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />' . "\n";		
		$html .= '<meta charset="UTF-8">';
		$html .= '<title>' . $this -> pageInfo['title'] . '</title>' . "\n";
		$html .= '<meta name="description" content="' . $this -> pageInfo['description'] . '" />' . "\n";
		$html .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>'. "\n";
    	$html .= '<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;' .'+'. 'callback=initialize"></script>'. "\n";
		$html .= '<link rel="stylesheet" type="text/css" href="css/styles.css" />' . "\n";
		$html .= '</head>' . "\n";

		// Begin page body
		$html .= '<body>' . "\n";
		$html .= '<header>'."\n";
		$html .= '<div>' . "\n";
		
		$html .= '<a class="logo left" href="index.php?page=home"';
		$html .= ($this -> pageInfo['page'] == 'home') ? ' ' : '';
		$html .= '><img src="images/ccarelogo.png"></a>'. "\n";
		
			if($this -> model -> checkAdmin()) {				
				$html .= '<h4>Hi Admin! <a href="index.php?page=admin" class="redhead">   Add Centre</a>'."\n";
				$html .= '<a href="index.php?page=centre" class="redhead"> | Edit&#47;Delete Centre</a>'."\n";
				$html .= '<a href="index.php?page=login" class="redhead">  | LOGOUT</a></h4>'."\n";
					if ($_GET['page'] == 'login') {
						$this -> model -> processLogout();					
						//header('Location: index.php?page=login');						
					}				
			} else {		
				if ($this -> model -> checkUser()) {
					$html .= '<h4>Hi ' . $_SESSION['firstName'] .'! <a href="index.php?page=user" class="redhead">   Rate Centre Now!</a>'."\n";
					$html .= '<a href="index.php?page=login" class="redhead">  | LOGOUT</a></h4>'."\n";
						if ($_GET['page'] == 'login') {
							$this -> model -> processLogout();							
						}
				} else {
					//link to login page
					$html .= '<a class="first blue link" href="index.php?page=login"';
			 		$html .= ($this -> pageInfo['page'] == 'login') ? '' : '';
					$html .= '>Login</a>' . "\n";
					$html .= '<a class="orange link" href="index.php?page=sign"'. "\n";
					$html .= ($this -> pageInfo['page'] == 'sign') ? '' : '';
					$html .= '>Free Account</a>' . "\n";
				}
											
			} 		

		//link to signup page


		$html .= '</div>' . "\n";				
		
		// Call the nav bar function
		$html .= $this -> displayNavBar();		

		// Return to where the function was called from (displayPage)
		return $html;
	}
	
	// This function creates and returns the nav bar
	private function displayNavBar() {		
		$html = '<div class="menu">' . "\n";

		//HOME link
		$html .= '<a class="orange nav" href="index.php?page=home"';
		$html .= ($this -> pageInfo['page'] == 'home') ? ' ' : '';
		$html .= '>Home</a>'. "\n";

		//about link
		$html .= '<a class="pink nav" href="index.php?page=about"';
		$html .= ($this -> pageInfo['page'] == 'about') ? '' : '';
		$html .= '>About Us</a>'. "\n";
		
		//directory
		$html .= '<a class="red nav" href="index.php?page=directory"';
		$html .= ($this -> pageInfo['page'] == 'directory') ? '' : '';
		$html .= '>Childcare Directory</a>'. "\n";
		//articles
		$html .= '<a class="blue nav" href="index.php?page=articles"';
		$html .= ($this -> pageInfo['page'] == 'articles') ? '' : '';
		$html .= '>Articles</a>'. "\n";
		//Ranked first
		$html .= '<a class="green nav" href="index.php?page=first"';		
		$html .= ($this -> pageInfo['page'] == 'first') ? '' : '';
		$html .= '>Ranked First</a>'. "\n";

		//contact		
		$html .= '<a class="purple nav" href="index.php?page=contact"';
		$html .= ($this -> pageInfo['page'] == 'contact') ? '' : '';
		$html .= '>Contact Us</a>' . "\n";
		
		//sitemap
		$html .= '<a class="orange nav" href="index.php?page=sitemap"';
		$html .= ($this -> pageInfo['page'] == 'sitemap') ? '' : '';
		$html .= '>Sitemap</a>'. "\n";
		$html .= '</div>' . "\n";
		$html .= '</header>'."\n";		
		
		// Return to where the function was called from (displayHeader)
		return $html;
	}
	
	// This function must be present in a sub class
	abstract protected function displayContent();
	
	// Display the footer
	private function displayFooter() {
		// Close tags
		$html = '</div>' . "\n";

		// Begin footer
		$html .= '<footer class="lblue clearfix">' . "\n";


		//sitemap links
		$html .= '<div class="left">'. "\n";
		$html .= '<ul class="connect">'. "\n";
		
		$html .= '<li>SITEMAP</a></li><br/>'. "\n";		
		
		$html .= '<li><a href="index.php?page=home"';
		$html .= ($this -> pageInfo['page'] == 'home') ? ' ' : '';
		$html .= '>Home</a></li>'. "\n";		

		$html .= '<li><a href="index.php?page=about"';
		$html .= ($this -> pageInfo['page'] == 'about') ? ' ' : '';
		$html .= '>About Us</a></li>'. "\n";

		$html .= '<li><a href="index.php?page=directory"';
		$html .= ($this -> pageInfo['page'] == 'directory') ? ' ' : '';
		$html .= '>Childcare Directory</li>'. "\n";

		$html .= '<li><a href="index.php?page=articles"';
		$html .= ($this -> pageInfo['page'] == 'articles') ? ' ' : '';
		$html .= '>Articles</li>'. "\n";

		$html .= '<li><a href="index.php?page=first"';
		$html .= ($this -> pageInfo['page'] == 'first') ? ' ' : '';
		$html .= '>Ranked First</a></li>'. "\n";

		$html .= '<li><a href="index.php?page=contact"';
		$html .= ($this -> pageInfo['page'] == 'contact') ? ' ' : '';
		$html .= '>Contact Us</a></li>'. "\n";

		$html .= '<li><a href="index.php?page=sitemap"';
		$html .= ($this -> pageInfo['page'] == 'sitemap') ? ' ' : '';		
		$html .= '>Sitemap</a></li>'. "\n";		

		$html .= '</ul>'. "\n";	
		$html .= '</div>'. "\n";

		//helpful sites links
		$html .= '<div class="left">'. "\n";
		$html .= '<ul class="connect">'. "\n";
		$html .= '<li>HELPFUL WEBSITES</li><br/>'. "\n";
		$html .= '<li><a href="https://www.plunket.org.nz/">Plunket</a></li>'. "\n";
		$html .= '<li><a href="http://www.kidshealth.org.nz/">Kids Health</a></li>'. "\n";
		$html .= '<li><a href="http://www.cyf.govt.nz/">Children Youth and Family</a></li>'. "\n";	
		$html .= '</ul>'. "\n";
		$html .= '</div>'. "\n";

		//social sites links
		$html .= '<ul class="connect left">	'. "\n";		
		$html .= '<li>Share On</li><br/>'. "\n";
		$html .= '<li><a href="https://www.facebook.com/">Facebook</a></li>'. "\n";
		$html .= '<li><a href="https://twitter.com/">Twitter</a></li>'. "\n";
		$html .= '<li><a href="https://pinterest.com/">Pinterest</a></li>'. "\n";
		$html .= '</ul>'. "\n";


		$html .= '<p class="clearfix copy">Copyright &copy; ' . date('Y') . ' All Rights Reserved ChildCareNZ.</p>';			
		
		$html .= '<script type="text/javascript" src="js/main.js"></script>';	
		
		$html .= '</footer>' . "\n";
		$html .= '</body>' . "\n";
		$html .= '</html>' . "\n";
		
		// Return to where the function was called from (displayPage)
		return $html;
	}
	

}

?>