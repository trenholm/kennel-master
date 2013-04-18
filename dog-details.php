<div class="row-fluid" id="detail-pane" name="detail-pane" style="display:none;">
	<div class="span12">
		<button class="btn" onClick="resetEditOptions();toggleDetails();"><i class="icon-double-angle-left"></i> Back to List</button>
		<button class="btn btn-info" onClick="editAll()" id="btn-edit" name="btn-edit"><i class="icon-edit"></i> Edit Details</button>
		<button class="btn btn-warning" onClick="cancelEdit()" id="btn-cancel" name="btn-cancel"><i class="icon-remove"></i> Cancel</button>
		<button class="btn btn-danger" id="btn-remove" name="btn-remove"><i class="icon-remove-sign"></i> Remove Dog</button>
	</div>
	<?php include('confirm-remove.php'); ?>
	<div class="row-fluid">
		<div class="span6" id="info-section" name="info-section">
			<h3 class="dog-name" id="name" name="name">Dog Name</h3>
			<table class="table table-striped">
				<tbody>
					<tr>
						<th>Registration #:</th>
						<td id="registration" name="registration"></td>
					</tr>
					<tr>
						<th>Registered Name:</th>
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
	<div class="row-fluid" id="litter-list" name="litter-list">
		<div class="span12">
			<hr>
			<h3>Litters</h3>
			<table class="table table-striped">
				<tbody>
					<tr><td>date &amp sire</td></tr>
					<tr><td>...</td></tr>
					<tr><td>...</td></tr>
					<tr><td>...</td></tr>
				</tbody>
			</table>
		</div>
	</div>
</div>