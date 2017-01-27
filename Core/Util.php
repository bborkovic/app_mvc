<?php 

namespace Core;

class Util {

	public static function obj2hash( &$objects , $field1 , $field2) {
		// if empty return empty array!
		if( empty($objects)) { return []; }
		
		// check if field or method exists
		$return_hash = [];
		$object = get_class($objects[0]);

		$check1 = '';
		if( property_exists( $object , $field1 ) ) {
			$check1 = "property";
		} elseif ( method_exists( $object , $field1 )) {
			$check1 = "method";
		} else {
			throw new \Exception("method obj2hash requires field1 to be field or method", 1);
		}
		
		$check2 = '';
		if( property_exists( $object , $field2 ) ) {
			$check2 = "property";
		} elseif ( method_exists( $object , $field2 )) {
			$check2 = "method";
		} else {
			throw new \Exception("method obj2hash requires field2 to be field or method", 1);
		}

		foreach ($objects as $object) {
			$key = ( $check1 == "property" ) ? $object->$field1 : $object->$field1();
			$val = ( $check2 == "property" ) ? $object->$field2 : $object->$field2();
			$return_hash[ $key ] = $val;
		}
		return $return_hash;
	}

}


?>