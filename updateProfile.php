<?php include("includes/header.php"); include("includes/changeImageAccount.php"); ?>

	<div class="container well" style="width: 610px; margin-top: 10px; border-radius: 200px">
			<form action="updateProfile.php" method="post" enctype="multipart/form-data" class="form-group">
				<!--- Account Image Change -->
				<label class="center-block" id="accountImage-mystyle" style="background: url('<?php echo $_SESSION['ImageDir']; ?>') no-repeat ;
				 background-size: 90px;"></label>
				<input type="file" name="fileToUpload" id="fileToUpload" class="center-block changeAccountImage">
					<div  style="width: 300px; height: 100px; margin: 0 auto 80px;position: relative;top: -50px; ">
						<input type="text" name="username" placeholder="Username" class="form-control text-center" 
							value="<?php echo $_SESSION['Username']; ?>"><br>
						<input type="Email" name="email" placeholder="Email" class="form-control text-center" 
							value="<?php echo $_SESSION['Email']; ?>"><br>
						<input type="text" name="password" placeholder="Password" class="form-control text-center"
							value="<?php echo $_SESSION['Password']; ?>"><br>
						<input type="text" name="phone" placeholder="Phone" class="form-control text-center"
							value="<?php echo $_SESSION['Phone']; ?>">
					</div>
					<div>
						<input type="submit" name="update" class="btn btn-primary pull-right col-lg-2" value="Update" style="margin-right: 100px;">
						<a href="reservation.php" class="btn btn-danger col-lg-2" style="margin-left: 100px;">Back</a>
					</div>
				
				<!--- end Account Image Change -->

			</form>
	</div>

<?php include("includes/footer.php"); ?>