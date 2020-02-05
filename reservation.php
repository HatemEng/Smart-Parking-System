<?php
	include("includes/header.php");
	include("includes/parkingCalculation.php");
	include("includes/changeImageAccount.php");
 ?>
<div class="clearfix">
	<nav class="leftNav-mystyle">
		<!-- Main Info -->
		<?php include("includes/mainInfo.php") ?>
		<!-- Resrvation Option -->

		<?php include("includes/reserveOption.php"); ?>
	</nav>
	<div id="map_style" style="position: absolute;left: 350px;top: 80px">
		<?php 
			$resLot = $userLot['name'] ;
			$group 	= preg_replace('!\d+!', '', $resLot);
			$id 	= preg_replace('/'.$group.'/', '', $resLot);
			include('includes/mapForDisktop.php'); 		
		?>
	</div>
</div>
 <?php include("includes/footer.php"); ?>