<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
ini_set('display_errors', 1);

require_once '../App/Config.php';
require_once '../Core/functions.php';
require_once '../Core/Session.php';
require_once '../Core/Error.php';
require_once '../Core/Database.php';
require_once '../Core/Model.php';
require_once '../App/Models/User.php';
require_once '../App/Models/Post.php';
use App\Models\User;
use Core\Session;
Session::session_start();


// $user = User::find_by_id(1);
// Session::login($user);

Session::logout();

echo "***";
echo User::get_logged_username();
echo "***";

echo Session::$user_id;

echo "The end of script";

?>