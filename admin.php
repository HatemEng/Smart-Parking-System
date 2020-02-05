<?php 
	include("includes/header.php");
	include_once("includes/connection.php");
 ?>

 	<div class="well" style="margin: 0">
 		<div>
 			<?php 
 				$query 	= "SELECT * FROM tbl_lots";
				$result_lot = mysqli_query($conn,$query);
 				$rows    = mysqli_num_rows($result_lot);
 				if ($rows > 0 ) {
 					while ($row = mysqli_fetch_assoc($result_lot)) {
 						$lot_name  = $row['name'];
 						$lot_used_by = $row['usedById'];
 						if ($lot_used_by != 0) {
 							$query 	= "SELECT * FROM tbl_accounts WHERE id = '$lot_used_by'";
							$result_user = mysqli_query($conn,$query);
							$row_user = mysqli_fetch_assoc($result_user);
							$user_name = $row_user['username'];

 						
 			 ?>
 			 <p><?php echo $lot_name."  -> ".$user_name. "</br>"; ?></p>
 			 <?php ;}}} ?>
 		</div>
 	</div>

 <?php include("includes/footer.php"); ?>