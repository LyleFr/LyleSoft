<?php


class LogService {

	static function CheckLogIn($value) {		
		
		if($value == 'false') {
			$temp = new Template('Template/login.html');
			return $temp->GetContent();
		} else {
			$temp = new Template('Template/logon.html');
			return $temp->GetContent();
		}
	}
}

?>