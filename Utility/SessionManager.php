<?php
/** 
 * @version 1.0 @author dvallade  @since 06/01/2016
 * implement language treatment by session.
 */
Class SessionManager {
	const DEFAULT_LANGUAGE = 'fr_fr'; 
	const CONFIG_FILE = './Config.xml';
	
	/**
	 * Get current Language
	 * @return $language the current language
	 */
	public function GetLanguage() {		
		if(!isset($_SESSION['Language']))
			self::SetLanguage(self::DEFAULT_LANGUAGE);		
		return $_SESSION['Language'];				
	}
	
	/**
	 * Set Current language
	 * @param $value : value for new langue, test if avaible language
	 */
	public function SetLanguage($value) {		
		if(self::IsAvailableLanguage($value))
			$_SESSION['Language'] = $value;
		else 
			$_SESSION['Language'] = self::DEFAULT_LANGUAGE;
	}
	
	/**
	 * 
	 * @param $language
	 * @return boolean
	 */	
	private function IsAvailableLanguage($language) {
		$config = simplexml_load_file(self::CONFIG_FILE);		
		return in_array($language,(array)$config->languages);
	}
}

?>