<?php

// include "create.php";

    $sql="SELECT * FROM test2";
	$host = "localhost";
	$user_name = "root";
	$password = "";
	$db_name = "test";
	$db_connection = mysqli_connect($host,$user_name,$password,$db_name);
    $query= mysqli_query($db_connection,$sql);
		// if ($query==false) {
		// 	echo "qosulmadi"; 
		// }else{
		// 	echo "qosuldu";
		// }
?>