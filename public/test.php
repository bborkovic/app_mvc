<?php 

// Enable Error reporting
error_reporting(E_ALL ^ E_DEPRECATED);
// error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$name = $_SESSION['name'];
echo $name;

echo "<br/>" . session_id();


session_destroy();

?>