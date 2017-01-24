<?php
error_reporting(E_ALL ^ E_DEPRECATED);
ini_set('display_errors', 1);

$a = "5";
$b = 5;


echo ($a == $b) ? "== is True" : "== is False";
echo "<br/>";
echo ($a === $b) ? "=== is True" : "=== is False";

?>