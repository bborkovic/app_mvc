<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
ini_set('display_errors', 1);

require_once '../App/Config.php';
require_once '../Core/functions.php';
require_once '../Core/Session.php';
require_once '../Core/Database.php';
require_once '../Core/Model.php';
require_once '../App/Models/User.php';

Core\Session::session_start();

$b = "<br/>";



echo "Begin of script$b";


Core\Session::message( ["Ovo je poruka", "info"]);



// echo output_message() . "<br/>";


echo "End of script$b";


// echo Core\Session::get_current_url() . $b;
// echo Core\Session::get_latest_url() . $b;

?>