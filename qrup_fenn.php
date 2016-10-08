<?php
// include "db_config.php";
$id = $_GET['id'];
$con =new PDO("mysql:host=localhost;dbname=education",'root','');
$sql = "CALL students_fenn($id)";
$result = $con->prepare($sql);

$result->setFetchMode(PDO::FETCH_ASSOC);
$result->execute();
while($values=$result->fetch())
{
	
	print_r($values['name']." ".$values['price']."Azn"."<br>");
	
}



?> 