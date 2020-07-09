<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('Map')){
	function Map($source,$destination){
		foreach($source as $value){
			$code = $value[0];
			$destination->$code = $value[1];
		}
		return $destination;
    }
}

/* End of file  */
