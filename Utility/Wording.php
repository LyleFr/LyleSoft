<?php
/**
 * @version 1.1 @since 06/01/2016 @author dvallade
 * Use XmlFile for get Wording values.
 * @version 1.0 @since 03/10/2013 @author dvallade
 * Create Class
 */
class Wording {
	const URL_DIRECTORY = './Resources/';
	
	const URL_ERROR = self::URL_DIRECTORY .'/wording.err.xml';			
	const URL_WORDING_BASE = self::URL_DIRECTORY .'/wording.';
	
	/***
	 * Get wording for Key
	 * @param string $key
	 */
	static function Get($key) {	
		
		$Session = new SessionManager();
		$var_lang  = $Session->GetLanguage();

		$wordingFile = self::URL_WORDING_BASE.$var_lang.'.xml';
		if(!file_exists($wordingFile))
			$wordingFile = self::URL_WORDING_BASE.'fr_fr.xml';
				
		$wordingValues = simplexml_load_file($wordingFile);
		$nodes = $wordingValues->xpath('//datas/data/key[.="'.$key.'"]/parent::*');
	
		if(count(((array)$nodes)) != 1)
			return self::GetError('wrd_001', $key);
		else 
			return $nodes[0]->value;		
	}
	
	/***
	 * Get error for code. Set the info in the string
	 * 
	 * @param string $err_code
	 * @param string $err_info
	 */
	static function GetError($err_code, $err_info) 
	{	
		$wordingValues = simplexml_load_file(self::URL_ERROR);
		$nodes = $wordingValues->xpath('//datas/data/key[.="'.$err_code.'"]/parent::*');
		
		return StringHelper::Format($nodes[0]->value, $err_info);
	}	
}
?>