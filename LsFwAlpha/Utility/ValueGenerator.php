<?php
/** 
 * @version 1.1 @since 26/09/2013 @author dvallade
 * Add parametre with default value for public methods.
 * @version 1.0 @since 25/09/2013 @author dvallade
 * Basic generation for password and Unique ID 
 */
 class ValueGenerator {

	private $start = 0; 
	
	public function Password($prefix = null, $size = 6, $more_entropy = false) {		 
		return self::Generate($prefix,$size,$more_entropy);
	}
	
	public function UniqueId($prefix = null, $size = 10, $more_entropy = true) {
		return self::Generate($prefix,$size,$more_entropy);
	}
	
	private function Generate($prefix, $size, $more_entropy) {					
		$value = md5(uniqid($prefix,$more_entropy));		
		return 	$prefix.substr($value, self::getStart(),$size);
	}
	
	protected function getStart() 
	{		
		return $this->start;
	}
	
	
}

?>