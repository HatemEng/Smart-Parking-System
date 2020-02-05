$(function() {

	/* For index Page */

		$('#btnClose').click(function() {
			$('#login_content').css('visibility', 'visible'),
			$('#login').css('visibility', 'hidden');	});


		$('#btnLogin').click(function() {
			$('#login_content').css('visibility', 'hidden'),
			$('#login').css('visibility', 'visible');	});



		$('#btnRegister').click(function() {
			$('#login_content').css('visibility', 'hidden'),
			$('#login').css('visibility', 'hidden'),
			$('#register').css('visibility', 'visible'); });


		$('.btnBackToLogin').click(function() {
			$('#login_content').css('visibility', 'hidden'),
			$('#login').css('visibility', 'visible'),
			$('#register').css('visibility', 'hidden'); });



	/* For Reservation Page */
		//for rservation button0
		var showOption = false;
		$('#reserveNow').click(function() { showOption = true,
			$('#mainInfo').css('visibility', 'hidden'),
			$('#reserveNow').css('visibility', 'hidden'),
			$('#rserveOption').css('visibility', 'visible'); });

		//for time rservation select
		var cbTimeSee = true;
		$('#cbRserveTime').click(function() {
			if (cbRserveTime) {$('#sRserveTime').css('visibility', 'visible'); cbRserveTime = false;}
			else {$('#sRserveTime').css('visibility', 'hidden'); cbRserveTime = true;}	});

		// confirm reservation lot \
		/*$('#reserveLotConfirm').click(function(){
			alert("You are submitted to reserve lot in this park"); });*/

		// this for privant reserve agin using the same account and can relase the lot 	
		var status = $('#statusOfReservation span').html();

		if ( status >= "We are reserved to you") {
			//alert("ok");
			$('#reserveNow').css('visibility', 'hidden');
			$('#relaseNow').css('visibility', 'visible'); 
		} else {
			$('#relaseNow').css('visibility', 'hidden'); 
			if (showOption == false) 
				$('#reserveNow').css('visibility', 'visible');
		}

		

		
});