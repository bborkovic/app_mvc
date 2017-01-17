<?php 

function message( $text, $succ_flag="normal"){
	$color = "black";
	switch ($succ_flag) {
		case "success":
			$color="green";
			break;
		case "error":
			$color="red";
			break;
		case "normal":
			$color="black";
			break;
	}
	echo "<font color=\"$color\">" . $text . '</font>';
}


?>

