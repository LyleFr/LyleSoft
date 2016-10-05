<?php

class IncludeService {
	static function IncludeTmpl($url_tmpl) {
		
		$temp = new Template($url_tmpl);
		return $temp->GetContent();
	}
}

?>