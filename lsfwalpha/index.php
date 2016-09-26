<?php

/***
 * Fonction magique d'autoloading
 * @param unknown $className
 */
function __autoload($className) {
	
	$base_url = './';
	Loader::Load_Classes($base_url,Loader::General_Config_File ,$className);
	
	$base_url = dirname(__FILE__).'/';	
	Loader::Load_Classes($base_url,Loader::Framework_Config_File ,$className);
	
}


class Loader {
	
	Const General_Config_File = 'Config.xml';
	Const Framework_Config_File = 'LsFw_Config.xml';
	
	static function Load_Classes($used_url, $config_file, $className) {
		$config = simplexml_load_file($used_url .'/'.$config_file);		
		
		foreach($config->includes as $including)
		{				
			foreach ($including->include as $directory) 
			{
				//see if the file exists
				if(file_exists($used_url.$directory.$className . '.php'))
				{				
					require_once($used_url.$directory.$className . '.php');
					return true;
				} 
			}
		}		
	}
	
	static function GetFrameworkConfigUrl()
	{
		return dirname(__FILE__).'/'. Loader::Framework_Config_File;		
	}
	
	static function GetGeneralConfigUrl()
	{
		return './'. Loader::General_Config_File;
	}
	
	
	
}	


?>