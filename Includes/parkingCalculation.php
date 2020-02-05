 
<?php 
	include_once("connection.php");
		////////// This for android to take userId ////////////////
	if ((isset($_POST['reserve_lot']) && $_POST['reserve_lot'] == 'yes') || 
		(isset($_POST['status']) && $_POST['status'] == 'yes')) {
		$userId = $_POST['userId'];
	} else {
		if (isset($_SESSION['UserId'])) $userId = $_SESSION['UserId']; 
		else $userId = -1;
	}
	///////////////////// Globle variable /////////////////////////////
		$parkIsFull = false;
	//////////// take Lots info from database /////////////////////
	$query 	= "SELECT * FROM tbl_lots";
	$result = mysqli_query($conn,$query);
	$lots 	= array(array());
	$lot 	= 0;
	while ($row = mysqli_fetch_assoc($result)) {
		$lots[$lot][0] = $row ['name'];
		$lots[$lot][1] = $row ['toMall'];
		$lots[$lot][2] = $row ['toPark'];
		$lots[$lot][3] = $row ['withFamily'];
		$lots[$lot][4] = $row ['parkingTime'];
		$lots[$lot][5] = $row ['usedById'];
		$lot ++;
	}
	////////// take the submitted value from the reservation form ///////////////////
	if (isset($_POST['reserve_lot'])  || (isset($_POST['reserve_lot']) && $_POST['reserve_lot'] == 'yes')) {
		
		$toMall = $_POST['toMall'];
		if ($toMall == "on") $toMall = 1 ;
			else $toMall = 0;
		$toPark = $_POST['toPark'];
		if ($toPark == "on") $toPark = 1 ;
			else $toPark = 0;
		$withFamily = $_POST['withFamily'];
		if ($withFamily == "on") $withFamily = 1 ;
			else $withFamily = 0;

		$timeOn = $_POST['parkingTime'];
		if ($timeOn == "on") $timeOn = 1 ;
			else $timeOn = 0;
		$timeValue = $_POST['timeValue'];
		$timeUnit  = $_POST['timeUnit'];
		/////////////////// Some var declartion ////////////////////////////
		$diff = array();
		$max = 0 ;
		$maxIndex ;
		$maxLotName;
		$minDiff ;
		$minDiffIndex = 0;
		$unitValue;
		//////////////// Calculate the match ////////////////////////
		$usreDesire = array('lot name',$toMall,$toPark,$withFamily);
		$match = array();
		///////////////// convert the all time unit to min unit //////////////////////////
		if ($timeOn == 1) {
					if ($timeUnit == "Days") $unitValue = $timeValue* 24 * 60;
					elseif ($timeUnit == "Hours") $unitValue = $timeValue * 60;
					elseif ($timeUnit == "Min") $unitValue = $timeValue;
		}
		///////////////////////// Start matching the specifiction //////////////////////
		foreach ($lots as $lot => $value) {
			foreach ($lots[$lot] as $key => $value) {
				if ($lots[$lot][$key] == $usreDesire[$key] && $lots[$lot][5] == 0) {
					$match[$lot] ++;
				}
			}
			//////////////// for Time calculate "the best lot in term of time"//////////////////
			if ($timeOn == 1) {
					$diff[$lot] = $lots[$lot][4] - $unitValue;
				}
		}
		///////////////////// find the min diff ////////////////////////
		if ($timeOn == 1) {
			$minDiff = -1;
			foreach ($diff as $key => $value) {
				if (($diff[$key] >= 0 && $diff[$key] < $minDiff ) || $minDiff < 0) {
					$minDiff = $diff[$key];
					$minDiffIndex = $key;
				}
			}
			$match[$minDiffIndex]++;
		}
		//////////// Now Find the maximam match //////////////////////
		foreach ($match as $key => $value) {
			if ($match[$key] > $max) {
				$max 		= $match[$key];
				$maxIndex 	= $key;
			}
		}
		//////////////////////// to make sure there will be no reserve if park is full /////////////////////
		if ($max >= 1) {
			$maxLotName = $lots[$maxIndex][0];
			$query 	= "UPDATE tbl_lots SET usedById = '$userId' WHERE name = '$maxLotName'";
			$result = mysqli_query($conn,$query);
		} else {
			///////////// Massege if park is full ///////////////////////
			$reservationFinalResult = "<span>The park is full right now please check later</span>";
			$parkIsFull = true;
		}

	} ///////////////////////////////// End of reservation submit /////////////////////////////////// 
	/////////////////////////// Sekect the lot that belong to the user /////////////////////////////////////////
	$query 	= "SELECT * FROM tbl_lots WHERE usedById = '$userId'";
	$result = mysqli_query($conn,$query);
	$userLot = mysqli_fetch_assoc($result);
	////////////////////// When the user relase the lot //////////////////////////
	$lotId = $userLot['id'];
	if (isset($_POST['relaseLot']) || (isset($_POST['relaseLot']) && $_POST['relaseLot'] == "yes")) {
		$query 	= "UPDATE tbl_lots SET usedById = '0' WHERE id = '$lotId'";
		$result = mysqli_query($conn,$query);
			////////// For android submite to relase ///////////////////////
		if (isset($_POST['relaseLot']) && $_POST['relaseLot'] == "yes") {
			echo "success";
			exit();
		}
		header("Location: reservation.php");
	}

	//////////////////// Now to make the user see his/her status in any time ///////////////////

	////////////////// if there are reserved or not ////////////////////////
	if ($result->num_rows > 0 && !$parkIsFull) {
		$reservationFinalResult = "<span>"."We are reserved to you -> ".$userLot['name']."</span>";
		if (isset($_POST['status']) && $_POST['status'] == 'yes') {
			echo "success";
			echo "We are reserved to you -> ".$userLot['name'];
			exit();
		}
	} elseif (!$parkIsFull){
		$reservationFinalResult = "<span>There are no reservation right now</span>";
	}
	
 ?>
