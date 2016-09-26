<?php


class LogService {

	static function CheckLogIn($value) {		
		
		if($value == 'false') {
			$temp = new Template('Template/login.html');
			return $temp->Render();
		} else {
			$temp = new Template('Template/logon.html');
			return $temp->Render();
		}
	}
}

?>