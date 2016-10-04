<?php 
include "index.php";
include "db_config.php";
//if (isset($_POST['delete'])) {
	
$id = $_GET['id'];
$sql = "DELETE FROM `test2` WHERE id= '$id'";


$query = mysqli_query($db_connection, $sql);

if ($query) {
	header("Location:show.php");
}else{
	echo "error";
}
//}
?>
 