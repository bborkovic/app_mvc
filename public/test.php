<?php 

// Enable Error reporting
error_reporting(E_ALL ^ E_DEPRECATED);
// error_reporting(E_ALL);
ini_set('display_errors', 1);


echo "begin<br/>";


try {
	$dt = new DateTime("invalid time string");
} catch (Exception $e) {
	echo "Problem: " . $e->getMessage();
}



echo "<br/>end";

?>