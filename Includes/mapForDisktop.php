<?php 
	$path1 = $path2 = $path3 = $path4 = $path5 = $path6 = $path7 = $path8 = $path9 = $path10 = 0;
	if (isset($_GET["group"] ) && isset($_GET["id"]) || isset($group) && isset($id)) {
		if (isset($_GET["group"] ) && isset($_GET["id"])) {
			$group 	= $_GET["group"] ;
			$id 	= $_GET["id"];
		}
		
		////////////// Lot A /////////////////////
		if ($group  == "A" && $id <= 20) {
			$left 	= (45*($id - 1)) + 8;
			$top 	= 533;
			////// For Arrow Location //////	
			$margin_top = -25;
			$dir 		= -1;
			//////// For path choice //////////
			if ($id <= 10) {
				$path1 = 1;
				$path2 = 1;
				$path3 = 1;
			} 
			else {
				$path1  = 1;
				$path3 	= 1;
				$path4	= 1;
				$path5 	= 1;
				$path6  = 1;
				if ($id <=17) {
					$path8 = 1;
				}
				else {
					$path7	= 1;
					$path9	= 1;
					$path10 = 1;
				}
			}
		}
		////////////// Lot B /////////////////////
		elseif ($group  == "B" && $id <= 17) {
			$left 	= (45*($id - 1)) + 8;
			$top 	= 8;	
			////// For Arrow Location //////	
			$margin_top = 45;
			$dir 		= 1;
			//////// For path choice //////////
			if ($id <= 10) {
				$path1 = 1;
				$path2 = 1;
				$path3 = 1;
			} 
			else {
				if ($id <= 13) {
					$path1 = 1;
					$path2 = 1;
					$path3 = 1;
					$path4 = 1;
				}
				else {
					$path1 = 1;
					$path3 = 1;
					$path4 = 1;
					$path5 = 1;
					$path6 = 1;
					$path8 = 1;
				}
			}
		}
		////////////// Lot C /////////////////////
		elseif ($group  == "C" && $id <= 12) {
			if ($id <= 7) {
					$left 	= (45*($id - 1)) + 8;
					$top 	= 158;
					////// For Arrow Location //////	
					$margin_top = -25;
					$dir 		= -1;

				}
			else {
				$left 	= 323;
				$top	= (45 * ($id - 8)) + 233;
				$width 	= 70;
				$height	= 40;
				/////// For Arrow Location //////
				$arraw_width 	= 60;
				$arrow_height	= 80;
				$margin_top		= -28;
				$margin_left	= 55;
				$dir_angle 		= 270;
			}
			//////// For path choice //////////
			$path1 = 1;
			$path2 = 1;
			$path3 = 1;
		}
		////////////// Lot D /////////////////////
		elseif ($group  == "D" && $id <= 12) {
			if ($id <= 6) {
					$left 	= 616;
					$top 	= 405 - (45 * ($id - 1));
					$width 	= 70;
					$height	= 40;
					/////// For Arrow Location //////
				$arraw_width 	= 60;
				$arrow_height	= 80;
				$margin_top		= -25;
				$margin_left	= 70;
				$dir_angle 		= 270;
				//////// For path choice /////////
				$path1  = 1;
				$path3 	= 1;
				$path4	= 1;
				$path5 	= 1;
				$path6  = 1;
				$path8	= 1;
				}
			else {
				$left 	= 496;
				$top	= 405 + (45 * ($id - 12));
				$width 	= 70;
				$height	= 40;
				////// For Arrow Location //////
				$arraw_width 	= 80;
				$arrow_height	= 60;
				$dir_angle 		= 90;
				$margin_top		= 16;
				$margin_left	= -55;
				//////// For path choice //////////
				$path1 = 1;
				$path2 = 1;
				$path3 = 1;
			}	
		}
		////////////// Lot E /////////////////////
		elseif ($group  == "E" && $id <= 6) {
			$left 	= 922.5;
			$top 	= 487 - (45 * ($id - 1));
			$width 	= 70;
			$height	= 40;
			////// For Arrow Location //////
			if ($id == 1) $margin_top	= 2;
			elseif ($id == 6) $margin_top = 18;
			else $margin_top	= 16;

			$arraw_width 	= 80;
			$arrow_height	= 60;
			$dir_angle 		= 90;
			$margin_left	= -45;
			//////// For path choice //////////
			$path1  = 1;
			$path3 	= 1;
			$path4	= 1;
			$path5 	= 1;
			$path6  = 1;
			$path7	= 1;
			$path9	= 1;
			$path10	= 1;
		}
		/////////// if there is no submit /////////////////////
		else {
			$top 	= -1000;
			$left 	= -1000;
		}
	}
		/////////// if there is no submit /////////////////////
		else {
			$top 	= -1000;
			$left 	= -1000;
		}

 ?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="includes/css/mapStyle.css">
	</head>
	<body>
		<div style="background: url('includes/drawing/park.png') no-repeat; width: 998px;height: 600px;">
			
			<!-- for path -->
			<div style="position: relative; bottom: 6px">
				<span style="opacity: <?php echo $path1 ?>" id="path1"><p style="position: relative;bottom: 5px">Exit</p></span>
				<span style="opacity: <?php echo $path2 ?>" id="path2"></span>
				<span style="opacity: <?php echo $path3 ?>" id="path3"><p style="position: relative;bottom: 5px">Enterance</p>
					</span>
				<span style="opacity: <?php echo $path4 ?>" id="path4"></span> 
				<span style="opacity: <?php echo $path5 ?>" id="path5"></span> 
				<span style="opacity: <?php echo $path6 ?>" id="path6"></span>
				<span style="opacity: <?php echo $path7 ?>" id="path7"></span> 
				<span style="opacity: <?php echo $path8 ?>" id="path8"></span>
				<span style="opacity: <?php echo $path9 ?>" id="path9"></span>  
				<span style="opacity: <?php echo $path10 ?>" id="path10"></span>  

		
				<!-- For arraw location -->
				<div id="pathTarget" style="position: absolute; left:<?php echo $left ?>px; top: <?php echo $top ?>px; 
				width: <?php echo $arraw_width ?>px; height: <?php echo $arrow_height ?>px; -moz-transform: scaleY(<?php echo $dir ?>);
				-webkit-transform: scaleY(<?php echo $dir ?>);-ms-transform: scaleY(<?php echo $dir ?>);
				margin-top:<?php echo $margin_top ?>px;margin-left:<?php echo $margin_left ?>px;-moz-transform: rotate(<?php echo $dir_angle ?>deg);
				-webkit-transform: rotate(<?php echo $dir_angle ?>deg); -ms-transform: rotate(<?php echo $dir_angle ?>deg);"></div>
					<!-- End -->
			</div>
		</div>
	</body>
</html>