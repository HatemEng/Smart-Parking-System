<div id="mainInfo">
			<ul>
				<li class="text-center"><h4>Main Info</h4></li>
				<li>Username  : <span><?php if($_SESSION['Username'])echo $_SESSION['Username']; 
					else echo"There is no user"; ?></span></li>
				<li>Status 	  : <span><?php 
					if($_SESSION['Username']) echo "Connected  "."<img src='includes/img/connected_icon.png'>";
						else echo "Disconnected  "."<img src='includes/img/unconnected_icon.png'>"; ?></span></li>
						<br><br>
						<li id="statusOfReservation">Reserve Status : <?php echo $reservationFinalResult; ?> </li>
			</ul>
			<input type="submit" name="resrve_now" value="Reserve Now" class="col-lg-8 col-lg-pull-2 pull-right
				 btn btn-success reserveNow-mystyle" id="reserveNow">
			<form method="post">
				<input type="submit" name="relaseLot" value="Relase the reserved lot" class="col-lg-8 col-lg-pull-2 pull-right btn btn-success reserveNow-mystyle" id="relaseNow">
			</form>
			<!-- Account Image and to update the profile-->
			<a href="updateProfile.php" id="accountImage-mystyle" style="background: url('<?php echo $_SESSION['ImageDir']; ?>') no-repeat ; background-size: 90px;  top: 140px;   position: absolute; left: 210px;"></a>
		</div>