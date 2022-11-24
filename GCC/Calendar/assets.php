<div class="modal fade" id="createevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="border-left: 4px solid #4e73df">
			<div class="modal-header">

			</div>




			<div class="modal-body">

				<div class="container">
					<h6><i class="fas fa-info-circle "></i> This will be added as draggable events</h6>
					<div class="form-group">
						<label for="exampleFormControlTextarea1"><span style="font-size: 14px;">Event:</span></label>
						<textarea style="font-size: 12px;" id="new-event" class="form-control" rows="3"></textarea>
						<span id="error" style="font-size: 12px;color: red"></span>
					</div>

					<div class="card" style="align-self: center;">
						<div class="container">

							<br>
							<span style="font-size: 14px;">Choose a color:</span>
							<p></p>
							<div class="container">

								<ul class="fc-color-picker" id="color-chooser">
									<li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
									<li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
									<li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
									<li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
									<li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
								</ul>
							</div>
							<p></p>
						</div>
					</div>



				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" style="font-size: 12px;"
					data-dismiss="modal">Close</button>
				<button type="submit" id="add-new-event" type="button" style="font-size: 12px;"
					class="btn btn-primary">Save</button>

			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="addeventdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="border-left: 4px solid #4e73df">
			<div class="modal-header">
				<p style="font-size: 14px">Adding event on ( <span id="dateselected"
						style="color: #b0475a;font-size: 15px;font-weight: bolder"></span> )</p>
			</div>




			<div class="modal-body">

				<div class="container">

					<div class="form-group">
						<label for="exampleFormControlTextarea1">Event:</label>
						<textarea class="form-control" id="eventtitlenewselected" style="font-size: 12px"
							rows="3"></textarea>
						<span id="erroradding" style="color: red;font-size: 12px;"></span>
					</div>

					<div class="card">
						<p></p>

						<div class="container">

							<h6>Choose Color: </h6>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text" id="btnGroupAddon"><input type="color" id="favcolor"
											name="favcolor" value="#4a6eb0"></div>
								</div>
								<input type="text" class="form-control " id="colorfav" readonly=""
									aria-label="Input group example" value="#4a6eb0" aria-describedby="btnGroupAddon">
							</div>


						</div>
						<p></p>
					</div>
					<input type="hidden" name="" id="selecteddatestart">
					<input type="hidden" name="" id="selecteddateend">
					<input type="hidden" name="" id="alldayval">

					<br>



				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" style="font-size: 12px;" style=""
					data-dismiss="modal">Close</button>
				<button type="button" id="savenewselected" type="button" class="btn btn-primary"
					style="font-size: 12px;">Save</button>

			</div>
		</div>
	</div>
</div>





<!-- Modal -->
<div class="modal fade" id="currenteventclicked" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content" id="headerevent">
			<div class="modal-header">
				<p style="font-size: 14px"></p>
			</div>
			<div class="modal-body" style="text-align: center;">

				<div class="container">
					<div class="form-group">
						<label for="exampleFormControlTextarea1"></label>

						<div id="disp1">

							<h5 id="eventtitleclicktxt"></h5>
							<span id="dateselecteds" style="color: #b0475a;font-size: 15px;font-weight: bolder"></span>
							<p></p>
						</div>
						<div id="disp2" class="d-none">
							<input type="text" name="" id="txttitle" data-eid="" class="form-control">
						</div>

						<p><br></p>

						<a href="javascript:void(0)" id="editclick"
							style="font-size: 15px; float: right;color: #4e73df"><span id="btntxt">Edit</span> <i
								class="fas fa-edit"></i></a>

					</div>




				</div>

			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-danger" id="deleteevent" style="font-size: 12px">Delete</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 12px">Close
				</button>
			</div>
		</div>
	</div>
</div>



<!-- Logout Modal-->
<?php include '../Dashboard/logoutmodal.php';  ?>

<!--end of modals-->



<script src="../../offline/sweetalert.js"></script>
<script type="text/javascript">
	$('#createevent').on('hidden.bs.modal', function (e) {
		$('#new-event').val('');
		$('#new-event').attr('style', 'font-size: 12px;');
		$('#error').text('');

	})

	$('#new-event').keyup(function () {
		$('#new-event').attr('style', 'font-size: 12px;');
		$('#error').text('');

	})


	$('#favcolor').on('input', function () {
		var color = $(this).val();
		$('#colorfav').val(color);
	});

	$('#addeventdate').on('hidden.bs.modal', function (e) {
		$('#eventtitlenewselected').attr('style', 'font-size:12px;');
		$('#eventtitlenewselected').val('');
		$('#erroradding').text('');

	})
	$('#eventtitlenewselected').keyup(function () {
		$('#eventtitlenewselected').attr('style', 'font-size:12px;');

		$('#erroradding').text('');
	})



	$('#eventtitleclicktxt').keyup(function () {
			$('#eventtitleclicktxt').attr('style', 'font-size:12px;');
			$('#errorediting').text('');


		})
		('#addeventdate').on('hidden.bs.modal', function (e) {
			$('#currenteventclicked').attr('style', 'font-size:12px;');
			$('#eventtitleclicktxt').attr('style', 'font-size:12px;');
			$('#errorediting').text('');

		})
</script>