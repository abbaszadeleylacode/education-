<?php 
// include "index.php";
include "db_config.php";
$query= mysqli_query($db_connection,$sql);

	
$id = $_GET['id'];
$sql = "DELETE FROM `students` WHERE id= '$id'";


$query = mysqli_query($db_connection, $sql);

if ($query) {
	header("Location:show.php");
}else{
	echo "error";
}

?>
 