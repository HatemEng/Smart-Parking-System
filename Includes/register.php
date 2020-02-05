<?php 
	error_reporting(0);
	session_start();
	include_once("connection.php");
	$firstRegister = false;
	if( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
		if ($_POST['username'] && $_POST['password'] && $_POST['email']) {
			$username 		= $_POST['username'];
			$password 		= $_POST['password'];
			$email 			= $_POST['email'];
			$phone 			= $_POST['phone'];
			$pic			= "includes/img/accounts/user.png";
			$query = "INSERT INTO tbl_accounts (id, username, password, email ,phone,pic) VALUES (NULL, '$username', '$password', '$email', '$phone','$pic')";
			$result = mysqli_query($conn , $query);
			if ($result > 0) {
				if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){
					echo "success"."<>".$pic;
					exit;
				}
				$firstRegister = true;
				include("login.php");
			//echo "Success";
			} 
			//else echo "Failed";
		}
	} 

 ?>





<!--<!DOCTYPE html>
<html>
	<head>
		<title>Register Page</title>
		<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="includes/style/style.css">
	</head>
	<body>
		<div class="container">
			<h1 class="text-center alert-info">Create Your Account</h1>
			<br><br><br>
			<div class="col-lg-8 col-lg-offset-2 well">
				<form class="form-group" method="post" action="<?php $_PHP_SELF ?>">
					<div class="col-lg-2">
						<label class=" label-mystyle label">Username :</label><br><br>
						<label class="label-mystyle label ">Email :</label><br><br>
						<label class="label-mystyle label">Password :</label><br><br>
						<label class="label-mystyle label">Phone :</label>
					</div>
					<div class="col-lg-10">
						<input type="text" name="username" placeholder="Username" class="form-control btn-mystyle">
						<input type="email" name="email" placeholder="Email" class="form-control btn-mystyle">
						<input type="password" name="password" placeholder="Password" class="form-control btn-mystyle">
						<input type="text" name="phone" placeholder="Phone" class="form-control btn-mystyle"><br>
							
					</div>
					<button class="btn btn-primary btn-group form-control btn-mystyle" name="create">Create</button>
				</form>
			</div>
		</div>
	</body>
</html>-->