<?php

class validate {
	public function checkErrors($messages) {
		$errors = false;
		foreach($messages as $message) {
			if($message) {
				// If there is even one message, we have errors
				$errors = true;
			}
		}
		return $errors;
	}

	public function checkName($name, $required) {
		if($required && !$name) {
			return 'Please enter a valid name';
		} else {
			$pattern = '/^[a-zA-Z-\'\. ]{2,30}$/';
			if(!preg_match($pattern, $name)) {
				return 'Please enter a valid name correctly';
			} else {
				return false;
			}
		}
	}
	public function checkUsername($username, $required) {
		if($required && !$username) {
			return 'Please enter a valid email address';
		} else {
			$pattern = '/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.(([0-9]{1,3})|([a-zA-Z]{2,3})|(aero|coop|info|museum|name))$/';
			if(!preg_match($pattern, $username)) {
				return 'Please enter a valid email address.';
			} else {
				return false;
			}
		}
	}

	public function checkEmail($emailAddress, $required) {
		if($required && !$emailAddress) {
			return 'Please enter a valid email address';
		} else {
			$pattern = '/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.(([0-9]{1,3})|([a-zA-Z]{2,3})|(aero|coop|info|museum|name))$/';
			if(!preg_match($pattern, $emailAddress)) {
				return 'Please enter a valid email address.';
			} else {
				return false;
			}
		}
	}

	public function checkPhone($phone, $required) {
		if($required && !$phone) {
			return 'Please enter a valid phone number';
		} else {
			if(!is_numeric($phone)) {
				return 'Please enter a valid phone number';
			} else {
				return false;
			}
		}
	}
	public function checkRate($rate, $required) {
		if($required && !$rate) {
			return 'Please enter 1-5, wherein 5 is the <br/> highest and 1 is the lowest. ';
		} else {
			if(!is_numeric($rate)) {
				return 'Please enter a rate from 5 to 1.';
			} else {
				return false;
			}
		}
	}

	public function checkDescription($description, $required) {
		if($required && !$description) {
			return 'Please enter the centre email or website';
		} else {
			$pattern = '/^[a-zA-Z0-9-\'\.@ \"]{2,60}$/';
			if(!preg_match($pattern, $description)) {
				if(!$required) {
					return false;
				}
				return 'Please enter the description correctly';
			} else {
				return false;
			}
		}
	}		

	
		
}
?>	