<?php 
	include_once("connection.php");
	/*if ($_SESSION['Username'] &&  isset($_POST['login'])) {
		header("location: reservation.php");
	}*/
	if( isset($_POST['username']) && isset($_POST['password']) && !isset($_POST['register']) || $firstRegister) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		//////////////// login by username or email and password /////////////////////
		$query = "SELECT * FROM tbl_accounts ".
		" WHERE (username = '$username' OR email = '$username') AND password = '$password'";
		$result = mysqli_query($conn, $query);
		if($result->num_rows > 0){
			$row = mysqli_fetch_assoc($result);
				$_SESSION['Username'] 	= $row['username'];
				$_SESSION['UserId']   	= $row['id'];
				$_SESSION['Email']		= $row['email'];
				$_SESSION['Phone']		= $row['phone'];
				$_SESSION['Password']	= $row['password'];
				$_SESSION['ImageDir']   = $row['pic'];
				$admin					= $row['admin'];
			
			if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){
				echo "success"."<>".$_SESSION['UserId']."<>".$_SESSION['Username']."<>".$_SESSION['Email']
					."<>".$_SESSION['Password']."<>".$_SESSION['Phone']."<>".$_SESSION['ImageDir'];
				exit;
			}
			$alert = "<p class='alert-success text-center'>Login success</p>";
			if ($admin  == 0) header("location: reservation.php"); //replace index.php with your url
			else header("location: admin.php");
	} else{
		$alert = "<p class='alert-danger text-center'>Login Failed</p>";
		$username = $password = "";
	} 
}
?>

<!--<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="includes/style/style.css">
	</head>
	<body>
		<div class="container">
			<h1 class="text-center alert-info">Login By Your Account Or Make One</h1>
			<br><br><br>
			<div class="col-lg-4 col-lg-offset-4 well">
				<?php echo $alert; ?>
				<form class="form-group" method="post" action="<?php $_PHP_SELF ?>">
					<input type="text" name="username" placeholder="Username" class="form-control btn-mystyle header-mystyle">
					<input type="password" name="password" placeholder="Password" class="form-control"><br>
					<button class="btn btn-primary btn-group form-control btn-mystyle" name="singIn">Sing In</button>
					<a href="register.php" class="btn btn-danger btn-group form-control btn-mystyle">Sing Up</a>
				</form>
			</div>
		</div>
	</body>
</html>-->