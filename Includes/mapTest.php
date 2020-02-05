<?php 
	if (isset($_GET["group"] ) && isset($_GET["id"])) {
		$group 	= $_GET["group"] ;
		$id 	= $_GET["id"];
		////////////// Lot A /////////////////////
		if ($group  == "A") {
			$left 	= (45*($id - 1)) + 8;
			$top 	= 533;	
		}
		////////////// Lot B /////////////////////
		elseif ($group  == "B") {
			$left 	= (45*($id - 1)) + 8;
			$top 	= 8;	
		}
		////////////// Lot C /////////////////////
		elseif ($group  == "C") {
			if ($id <= 7) {
					$left 	= (45*($id - 1)) + 8;
					$top 	= 158;
				}
			else {
				$left 	= 323;
				$top	= (45 * ($id - 8)) + 233;
				$width 	= 70;
				$height	= 40;
			}	
		}
		////////////// Lot D /////////////////////
		elseif ($group  == "D") {
			if ($id <= 6) {
					$left 	= 616;
					$top 	= 405 - (45 * ($id - 1));
					$width 	= 70;
					$height	= 40;
				}
			else {
				$left 	= 496;
				$top	= 405 + (45 * ($id - 12));
				$width 	= 70;
				$height	= 40;
			}	
		}
		////////////// Lot E /////////////////////
		elseif ($group  == "E") {
					$left 	= 922.5;
					$top 	= 487 - (45 * ($id - 1));
					$width 	= 70;
					$height	= 40;
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
		<link rel="stylesheet" type="text/css" href="css/mapStyle.css">
	</head>
	<body >
		<div style="background: url('drawing/park.png') no-repeat  ; width: 1000px; height: 600px;">
			<div id="parkedLot" style="position: absolute; left:<?php echo $left; ?>px; top: <?php echo $top; ?>px; 
			width: <?php echo $width; ?>px; height: <?php echo $height; ?>px;"></div>
		</div>
		
		<!--<form method="get" action="<?php $_PHP_SELF ?>">
			<input type="text" name="id" placeholder="id">
			<input type="text" name="ap" placeholder="Ap">
		</form>-->
	</body>
</html>