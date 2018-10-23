<?php

namespace COG\Recruiting\Utils;


/**
 * This is a validation class for different validation
 */
class Validation{

	/**
	*
	*	@param $url
	*	@return $boolean
	*/
	public static function isURLValid($url){
		return filter_var($url, FILTER_VALIDATE_URL)? TRUE:FALSE;
	}
}