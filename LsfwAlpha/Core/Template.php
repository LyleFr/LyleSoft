<?php

class Template {
	
	private $url;
	
	function __construct($expect_url) {		
		$this->url = $expect_url;
	}

	function Render() {

		$homepage = file_get_contents($this->url);
		
		$var = preg_match_all('#{%.*?%}#', $homepage, $matches);
		
		foreach ($matches as $matche)
			foreach ($matche as $result)
			{	
				
				$callingTo = str_replace('{%','',str_replace('%}', '',explode('|',$result)[0]));
				$args = str_replace('{%','',str_replace('%}', '',explode('|',$result)[1]));
								
				// Chercher le service déclarer puis l'appeller avec l'args 
				$arrayCall = ServiceFinder::GetByName($callingTo);
			    $var = $arrayCall[0]::$arrayCall[1]($args);			
				$homepage = str_replace($result, $var, $homepage );
			}

		echo $homepage;

	}
}


?>