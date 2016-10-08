<?php
session_start();
if (!isset($_SESSION['check'])) {

		header('Location:login.php');
	
}
else{
	$user=$_SESSION['check'];
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">


<link rel="stylesheet" href="assets/css/style.css">
<script   src="https://code.jquery.com/jquery-2.2.4.js"   integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="   crossorigin="anonymous"></script>
<style>

.create{
	margin-bottom: 20px;
	background:lightgreen;
	color:white;
}
table{
	margin-top:50px;
}
a{  
	padding:5px;
	text-decoration: none;
	border-radius: 5px;
}
.read{
	background-color:#F0F0F0;
}
.update{
	background-color:green;
	color:white;
}
.delete{
	background-color: darkred;
	color:white;
}

</style>


<?php
include "db_config.php";
?>

</head>

<body>
<div class="container-fluid">
<div class="row">


<?php
if ($user[0]->type) {
	?>
<table class="table table-bordered">
  <thead>
    <tr>
    <th>ID</th>
      <th>Ad</th>
      <th>Email Adres</th>
      <th>Mobil nömrə</th>
       <th>Parol</th>
        <th>istifadəçi adı</th>
         <th>İxtisas qrupu</th>
         <th>Status</th>
         <th>Redaktə</th>
    </tr>
  </thead>

  <tbody>
<h1>Qeydiyyatdan  keçən tələbələr</h1>
<a href="register.php" class="btn btn-danger " >Logout</a>
<?php

$query= mysqli_query($db_connection,$sql);

while ($row  = mysqli_fetch_assoc($query)){

?>
<tr>

<?php

	foreach ($row as $key => $value) {
		?>
		<td> <?= $value; ?></td>
		<?php
	}
	
	?>

	<td> <a href="read.php?id=<?=$row['id']?>" class="read">Ətraflı</a>
	     <a href="update.php?id=<?=$row['id']?>" class="update">Yenilə</a>
	     <a href="delete.php?id=<?=$row['id']?>" class="delete">İstifadəçini Sil</a>
	     
	 </td>
	</tr>
	
	<?php
     } 

 }else{


  ?>
</head>

  <h1 style="color: orange" class="text-center">Şəxsi məlumatlar</h1>
  <div class="col-md-6 col-md-offset-3" style="margin-top: 50px; ">

  
  
  
   
   

<div class="list-group ">
  <a href="#" class="list-group-item  "><h4><b>Ad</b> - <?= $user[0]->name ?></h4></a>
  <a href="#" class="list-group-item "><h4><b>Istifadəçi adı</b> - <?= $user[0]->username ?></h4> </a>
  <a href="#" class="list-group-item "><h4><b>Email ünvani</b> - <?= $user[0]->adress ?></h4></a>
  <a href="#" class="list-group-item "><h4><b>Mobil nömrə</b> - <?= $user[0]->anumber ?></h4> </a>
  <a href="#" class="list-group-item "><h4><b>İxtisas qrupu</b> - <?= $user[0]->student_group ?></h4></a>

	<a href="#" class="list-group-item " id="list"  value="<?=$user[0]->id?>"><h4><b>Seçilən fənnlər</b></h4>
	</a>
	<a href="#" class="list-group-item " id="summ"  value="<?=$user[0]->id?>"><h4><b>Seçilən fənnlərin cemi qiymeti</b></h4>
	</a>
	</div>

								<script type="text/javascript">
									$(document).ready(function($) {
											var val = $('#list').attr('value');
											$.ajax({
												url: 'qrup_fenn.php',
												type: 'GET',
												data: {id: val},
												success:function(data){
													$('#list').append(data)
												}
											})
											
										})
								
								</script>
								<script type="text/javascript">
									$(document).ready(function($) {
											var val = $('#summ').attr('value');
											$.ajax({
												url: 'summ_fenn.php',
												type: 'GET',
												data: {id: val},
												success:function(data){
													$('#summ').append(data)
												}
											})
											
										})
								
								</script>




<form action="" method="post">
  <input class="btn btn-danger pull-right " name="back" type="submit" value="Back" >
</form>
  </div>

</div>

</body>
</html>
<?php

if(isset($_POST["back"])) {
  
  header("Location:register.php");
}


 }

?>
<!-- 777777777777777777777777777777777777777777777777777777777777777777777 -->












</tbody>
</table>
</div>
</div>
</body>
</html>
