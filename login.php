<?php
session_start();
if (isset($_SESSION['check'])) {

		unset($_SESSION['check']);
	
}
?>

<!doctype html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

		<!-- <div class="container">
			<div class="row">
				<div class="loginForm col-md-4 col-md-offset-4">
					<img src="no-image.png" class="img-circle">
					<h3>Giriş</h3>
<form class="form-inline" action="" method="POST">
  <div class="form-group">
  <label >Username:</label>
 <input class="form-control" type="text" name="user">
</div><br><br>
<div class="form-group">
<label>Password:</label>
 <input class="form-control" type="password" name="pass">
 </div><br>
<input type="submit" class="btn btn-success"  value="Login" name="submit" /><br>
<br><a href="register.php" class="btn btn-primary">Qeydiyyat</a>
</form>
</div>
</div>
</div> -->


<div class="container">
 
  <!-- Trigger the modal with a button -->
  <button type="button"  class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Log In</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">GIRIS</h4>
        </div>
        <div class="modal-body">
                <form class="form-inline" action="" method="POST">
  <div class="form-group">
  <label >Username:</label>
 <input class="form-control" type="text" name="user">
</div><br><br>
<div class="form-group">
<label>Password:</label>
 <input class="form-control" type="password" name="pass">
 </div><br>
<input type="submit" class="btn btn-success"  value="Login" name="submit" /><br>
<br><a href="register.php" class="btn btn-primary">Qeydiyyat</a>
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


<?php
$pdo=new PDO('mysql:host=127.0.0.1;dbname=education','root','');
if (isset($_POST['submit'])) {
$user=$_POST['user'];
$pass=$_POST['pass'];



if (!empty($user)&&!empty($pass)) {
	$query=$pdo->prepare("select * from students where username='$user' and password='$pass'");
	$query->execute();

	$answer=$query->fetchAll(PDO::FETCH_OBJ);
	if (!empty($answer)) {
		session_start();
		$_SESSION['check']=$answer;
		header('Location:show.php');
	}
	else{
		header('Location:login.php');
	}
 }else{
		header('Location:login.php');
	}


}






?>
</body>
</html>