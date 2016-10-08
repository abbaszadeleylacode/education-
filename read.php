<!DOCTYPE html>
<html>
<head>
  <title></title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">


<link rel="stylesheet" href="assets/css/style.css">

  <?php

 include "db_config.php";

$id=$_GET['id'];


 $sql="SELECT id,name,adress,anumber,password,username,student_group FROM students WHERE id=$id";

 $query=mysqli_query($db_connection,$sql);


 $row=mysqli_fetch_assoc($query);


  ?>
</head>
<body>
<div class="container-fluid">
  <h1 style="color: orange" class="text-center">Tələbənin məlumatları</h1>
  <div class="col-md-6 col-md-offset-3" style="margin-top: 50px; ">

  <div class="list-group ">
  <a href="#" class="list-group-item "><h4><b>Ad</b> - <?php echo $row['name']; ?></h4></a>
  <a href="#" class="list-group-item"><h4><b>Istifadəçi adı</b> - <?php echo $row['username']; ?></h4> </a>
  <a href="#" class="list-group-item"><h4><b>Email ünvani</b> - <?php echo $row['adress']; ?></h4></a>
  <a href="#" class="list-group-item"><h4><b>Mobil nömrə</b> - <?php echo $row['anumber']; ?></h4> </a>
  <a href="#" class="list-group-item"><h4><b>İxtisas qrupu</b> - <?php echo $row['student_group']; ?></h4></a>
  <a href="#" class="list-group-item"><h4><b>Parol</b> - <?php echo $row['password']; ?></h4></a>

 <!-- burda qisa yazmag olardi -->
<a href="#" class="list-group-item " id="list"  value=""><h4><b>Seçilən fənnlər</b></h4>
<?php

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

  </a>


  <a href="#" class="list-group-item " id="summ"  value=""><h4><b>Seçilən fənnlərin cemi qiymeti</b></h4>
<?php
$id = $_GET['id'];
$con =new PDO("mysql:host=localhost;dbname=education",'root','');
$sql = "CALL kurs_qiymeti($id)";
$result = $con->prepare($sql);

$result->setFetchMode(PDO::FETCH_ASSOC);
$result->execute();
while($values=$result->fetch())
{
  print_r($values['qiymet']."Azn"."<br>");
}
?> 
  </a>
  <!-- buraaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->







</div>

<form action="" method="post">
  <input class="btn btn-danger create pull-right" name="back" type="submit" value="Back" >
</form>
  </div>

</div>

</body>
</html>
<?php

if(isset($_POST["back"])) {
  
  header("Location:show.php");
}

?>