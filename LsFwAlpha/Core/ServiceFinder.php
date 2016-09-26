<?php

class ServiceFinder {
	
	static function GetByName($name) {
			
		$base_url = dirname(__FILE__).'/';
		$config = simplexml_load_file(Loader::GetGeneralConfigUrl());
		
		foreach($config->services as $services)
		{
			foreach ($services->service as $definedService)
			{
				//var_dump($definedService);	
				if($definedService['name'] == $name);
					return 	array((string)$definedService['classes'],(string)$definedService['method']);		
			}
		}
	}
	
	
}


?>