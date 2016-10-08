
<!doctype html>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script   src="https://code.jquery.com/jquery-2.2.4.js"   integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="   crossorigin="anonymous"></script>
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="panel panel-success">
			<div class="panel-heading text-center" ><h4 >Tələbə qeydiyyatı</h4></div>
			<div class="panel-body">
				<div class="container">
					<div class="row">
						<div class="loginFormRegister">
							<!-- 	<img src="no-image.png" class="img-circle"> -->
							<!-- 	<h3>Tələbə qeydiyyatı</h3> -->
							
							<form   action="" method="POST">
								<!-- 	<div class="col-md-4 "> -->
								<div class="form-group">
									<input placeholder="Ad"  class="form-control input-lg"  type="text" name="name">
								</div>
								<div class="form-group">
									<input placeholder="Istifadəçi adı" class="form-control input-lg" type="text" name="username">
								</div>
								<div class="form-group">
									<input placeholder="E-mail ünvanı" class="form-control input-lg" type="text" name="adress">
								</div>
								<div class="form-group">
									<input placeholder="Mobil nömrə" class="form-control input-lg" type="text" name="anumber">
								</div>
								<div class="form-group">
									<input placeholder="Parol" class="form-control input-lg" type="password" name="pass">
								</div>
								<div class="form-group">
									<select class="form-control input-lg"  name="group" id="group">
										<optgroup value="0" label="Abituriyent">
											<option value="1">I qrup</option>
											<option value="2">II qrup</option>
											<option value="3">III qrup</option>
											<option value="4">VI qrup</option>
										</optgroup>
									</select>
								</div>
								<script type="text/javascript">
									jQuery(document).ready(function($) {
										$('#group').change(function(){
											var val = $(this).val();
											$.ajax({
												url: 'fenn.php',
												type: 'GET',
									
												data: {value: val},
												success:function(data){
													$('.checkBox').empty();
													$('.checkBox').append(data);
												}
											})
											
										})
									});
								</script>
								<!-- checkbox gelir -->
								<div class="form-group">
									<div class=" checkBox ">
								    </div>
								</div>
								<!-- checkbox son -->
								<div class="form-group">
									<input  type="submit" class="btn btn-success" value="Qeydiyyat" name="submit">
								</div>
								<div class="form-group">

								<a href="login.php"><input type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal" value="Login" ></a>
								</div>
							</form>
						</div>
					</div>
					
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
			$ders = $_POST['ders'];
			$con=mysql_connect('localhost','root','') or die(mysql_error());
			mysql_select_db('education') or die("cannot select DB");
			$query=mysql_query("SELECT * FROM students WHERE username='".$user."'");
			$numrows=mysql_num_rows($query);
			if($numrows==0)
			{
			$sql="INSERT INTO students( name,username,adress,password,anumber,student_group) VALUES('$name','$user','$adress','$pass','$anumber',$group)";
			$result=mysql_query($sql);
			$sql2 = "SELECT id FROM `students` ORDER BY id DESC LIMIT 1";
			$aa =mysql_query($sql2);
			$id = mysql_fetch_array($aa);
			for ($i=0; $i < count($ders) ; $i++) {
				$sql1="INSERT INTO kurs(students_id,fenn_id) VALUES('$id[0]','$ders[$i]')";
				$kurs = mysql_query($sql1);
				
			}
			
			if($result){
			echo "<div class='alert alert-success'>qeydiyyat ugurlu!</div>";
			} else {
			echo "<div class='alert alert-danger'>Ugursuz!</div>";
			}
			} else {
			echo "<div class='alert alert-info'>Bu istifadeci adi artiq movcuddur! zehmet olmasa basgasini secin!</div>";
			}
		} else {
			echo "<div class='alert alert-warning'>Butun xanalari doldurun!</div>";
		}
		}
		?>

	</body>
</html>