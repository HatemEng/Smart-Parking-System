<div id="rserveOption">
			<ul>
				<li class="rserveNote-mystyle">Note: Check Only the Required Services</li><br>
				<form class="form-group" method="post">
					<div class="form-control">
						<label>Going To The Mall</label>
						<input type="Checkbox" name="toMall" class="pull-right">
					</div><br>
				
					<div class="form-control">
						<label>Going To The Park</label>
						<input type="Checkbox" name="toPark" class="pull-right">
					</div><br>

					<div class="form-control">
						<label>With Family</label>
						<input type="Checkbox" name="withFamily" class="pull-right">
					</div><br>

					<div class="form-control">
						<label>Specify Parking Time</label>
						<input type="Checkbox" name="parkingTime" class="pull-right" id="cbRserveTime">
					</div><br>

						<div class="form-control" id="sRserveTime">
							<label>Parking Time</label>
							<select class="pull-right col-lg-4" name="timeUnit">
								<option>Min</option>
								<option>Hours</option>
								<option>Days</option>
							</select>
							<input type="text" name="timeValue" class="col-lg-3 pull-right">
					</div><br>
					<li class="rserveNote-mystyle">*All Option Above Are Optional</li><br>
					<input type="submit" name="reserve_lot" value="Reserve Lot" 
						class="col-lg-10 col-lg-pull-1 pull-right btn btn-success" id="reserveLotConfirm"><br><br>
					<input type="submit" name="" id="cancel" value="Cancel" class="col-lg-8 col-lg-pull-2 pull-right btn btn-">
				</form>
			</ul>
		</div>	