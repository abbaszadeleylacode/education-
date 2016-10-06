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

echo $row['name'];
  ?>
</head>
<body>
<div class="container">
  <h1 style="color: orange">Tələbənin məlumatları</h1>
  <div class="col-md-6 col-md-offset-3" style="margin-top: 50px; ">

  <h2>Ad -<?php echo $row['name']; ?></h2>
  <h2>Email Adres - <?php echo $row['adress']; ?></h2>
  <h2>Mobile Nömrə - <?php echo $row['anumber']; ?></h2>
  <h2>Parol - <?php echo $row['password']; ?></p>
  <h2>istifadəçi adı - <?php echo $row['username']; ?></h2>
  <h2>İxtisas qrupu - <?php echo $row['student_group']; ?></h2>

<form action="" method="post">
  <input class="btn btn-default create" name="back" type="submit" value="Back" >
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