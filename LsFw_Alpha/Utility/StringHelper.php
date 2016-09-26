<?php
/***
 * 
 * @version 1.0 @since 12/09/2016 @author dvallade
 * Basic method for help format string
 */

class StringHelper {
	
	static function format($format) {
		$args = func_get_args();
		$format = array_shift($args);

		preg_match_all('/(?=\{)\{(\d+)\}(?!\})/', $format, $matches, PREG_OFFSET_CAPTURE);
		$offset = 0;
		foreach ($matches[1] as $data) {
			$i = $data[0];
			$format = substr_replace($format, @$args[$i], $offset + $data[1] - 1, 2 + strlen($i));
			$offset += strlen(@$args[$i]) - 2 - strlen($i);
		}

		return $format;
	}
	
}


?>