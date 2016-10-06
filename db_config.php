<?php

// include "create.php";

    $sql="SELECT * FROM students";
	$host = "localhost";
	$user_name = "root";
	$password = "";
	$db_name = "education";
	$db_connection = mysqli_connect($host,$user_name,$password,$db_name);
    // 
		// if ($query==false) {
		// 	echo "qosulmadi"; 
		// }else{
		// 	echo "qosuldu";
		// }
?>