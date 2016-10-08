<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<div class="container-fluid text-center">
  <h3 ><b>Istifadəçinin məlumatlarını dəyiş<b></h3>
 </div>
  <div class="container">
 
      <div class="container-fluid">
		  <form method="post" action="">
			 <input type="text" name="forname" placeholder="Ad " class="form-control input-lg">     
			 <input type="text" name="foradress" placeholder="email" class="form-control input-lg">  
			 <input type="text" name="foranumber" placeholder="nomre" class="form-control input-lg">
			 	 <input type="text" name="forpassword" placeholder="parol" class="form-control input-lg">   
			 	 <input type="text" name="forusername" placeholder="istifadeci adi" class="form-control input-lg"> 
			 	 <input type="text" name="forstudent_group" placeholder="ixtisas qrupu" class="form-control input-lg"> 
			 <input class="btn-success  button" type="submit" value="update" name="submit"> <input class="button pull-right btn-danger" type="submit" value="back" name="submit" >
		  </form>
      </div>
    
</div>

<?php 

include "db_config.php";

if (isset($_POST['submit'])) {
	$new_name = $_POST['forname'];
	$new_adress = $_POST['foradress'];
	$new_anumber = $_POST['foranumber'];
	$new_password = $_POST['forpassword'];
	$new_username = $_POST['forusername'];
	$new_student_group = $_POST['forstudent_group'];

    $id=$_GET['id'];
	$sql = "UPDATE `students` SET `name`='$new_name',`adress`='$new_adress',`anumber`='$new_anumber',`password`='$new_password',`username`='$new_username',`student_group`='$new_student_group' WHERE id = '$id' ";
	
	$query = mysqli_query($db_connection,$sql);
	if ($query) {
		header("Location:show.php");
	}else {
		echo "error";
	}
}

?>
</body>
</html>