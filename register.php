<!doctype html>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/i18n/defaults-*.min.js"></script>

	</head>

	<body>
		
		<div class="container">
			<div class="row">
				<div class="loginForm col-md-4 col-md-offset-4">
					<img src="no-image.png" class="img-circle">
					<h3>Tələbə qeydiyyatı</h3>
					
					<form  class="form-inline" action="" method="POST">
						<div class="form-group">
							
							<input placeholder="name" class="form-control" type="text" name="name"><br />
						</div><br>

						<div class="form-group">
						
							<input placeholder="username" class="form-control" type="text" name="username"><br />

						</div><br>
						<div class="form-group">
							
							<input placeholder="email" class="form-control" type="text" name="adress"><br />
						</div><br>
						<div class="form-group">
							
							<input placeholder="number" class="form-control" type="text" name="anumber"><br />
						</div><br><br>
						

						<div class="form-group">
								<select class="form-control" name="group" >
								<optgroup value="0" label="Abituriyent">
								  <option value="1">I qrup</option>
								  <option value="2">II qrup</option>
								  <option value="3">III qrup</option>
								   <option value="4">VI qrup</option>
								   </optgroup> 
								</select>					
					     </div><br>
<!-- 					     <div class="form-group">
					     	<select class="form-control" name="group">
								<optgroup value="0" label="Xarici dil">
								  <option value="">Rus dili</option>
								  <option value="">Ingilis dili</option>
								  <option value="">Türk dili</option>
								   <option value="">Alman dili</option>
								   </optgroup> 
					     	</select>
					     </div>	 -->					
						<div class="form-group">
						
							<input placeholder="parol" class="form-control" type="password" name="pass"><br />
						</div><br>
						
						<div class="form-group">
							<input type="submit" class="btn btn-success" value="Qeydiyyat" name="submit" /><br>
						</div><br><br>

						<div class="form-group">
							<a href="login.php" class="btn btn-primary">Login</a>
						</div>	<br><br>
<br>
</form>

					</div>
				</div>
			
		</div>
		<?php
		if(isset($_POST["submit"])){
		if(!empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['adress']) && !empty($_POST['anumber'])&& !empty($_POST['pass']) && !empty($_POST['group'])) {
			$name=$_POST['name'];
		
			$user=$_POST['username'];
			$adress=$_POST['adress'];
			$pass=$_POST['pass'];
			$anumber=$_POST['anumber'];
			$group=$_POST['group'];
			$con=mysql_connect('localhost','root','') or die(mysql_error());
			mysql_select_db('test') or die("cannot select DB");
			$query=mysql_query("SELECT * FROM test2 WHERE username='".$user."'");
			$numrows=mysql_num_rows($query);
			if($numrows==0)
			{
			$sql="INSERT INTO test2( name,username,adress,password,anumber,student_group) VALUES('$name','$user','$adress','$pass','$anumber',$group)";
			$result=mysql_query($sql);
			if($result){
			echo "qeydiyyat ugurlu!";
			} else {
			echo "Ugursuz!";
			}
			} else {
			echo "Bu istifadeci adi artiq movcuddur! zehmet olmasa basgasini secin!";
			}
		} else {
			echo "Butun xanalari doldurun!";
		}
		}
		?>
	</body>
</html>