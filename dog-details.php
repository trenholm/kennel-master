  <div class="row-fluid" id="detail-pane" name="detail-pane" style="display:none;">
	<div class="span12">
		<button class="btn" onClick="toggleDetails()"><i class="icon-double-angle-left"></i> Back to List</button>
		<button class="btn" id="btn-edit" name="btn-edit"><i class="icon-edit"></i> Edit Details</button>
		<button class="btn btn-danger" id="btn-remove" name="btn-remove"><i class="icon-minus-sign"></i> Remove Dog</button>
	</div>
	<?php include('confirm-remove.php'); ?>
	<div class="row-fluid">
		<div class="span6">
			<h3 id="name" name="name">Dog Name</h3>
			<table class="table table-striped">
				<tbody>
					<tr>
						<th>Registration:</th>
						<td id="registration" name="registration"></td>
					</tr>
					<tr>
						<th>Name:</th>
						<td id="name" name="name"></td>
					</tr>
					<tr>
						<th>Callname:</th>
						<td id="callname" name="callname"></td>
					</tr>
					<tr>
						<th>Gender:</th>
						<td id="gender" name="gender"></td>
					</tr>
					<tr>
						<th>Date of Birth:</th>
						<td id="dateOfBirth" name="dateOfBirth"></td>
					</tr>
					<tr>
						<th>Breed:</th>
						<td id="breed" name="breed"></td>
					</tr>
					<tr>
						<th>Sire:</th>
						<td id="sire" name="sire"></td>
					</tr>
					<tr>
						<th>Dame:</th>
						<td id="dame" name="dame"></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="span6">
			<h3>Alerts</h3>
			<table class="table table-striped">
				<tbody>
					<tr><td>...</td></tr>
					<tr><td>...</td></tr>
					<tr><td>...</td></tr>
					<tr><td>...</td></tr>
				</tbody>
			</table>
		</div>
	</div>
	<hr />
	<?php 
		// TODO: only display if female and has any litters recorded!

	?>
  </div>
