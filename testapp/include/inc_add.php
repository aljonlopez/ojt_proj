<link href="scripts/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h1 class="text-center"><b>Register Form</b></h1>
		</div>
			
		<div class="modal-body">
			<form action="process/pro_add.php" class="form col-md-12 center-block" method="post">
				<div class="form-group">
					<input name="fname" placeholder="First Name" type="text" class="form-control input-lg">
				</div>
				<div class="form-group">
					<input name="lname" placeholder="Last Name" type="text" class="form-control input-lg">
				</div>
				<div class="form-group">
					<input name="mname" placeholder="Middle Name" type="text" class="form-control input-lg">
				</div>
				<div class="form-group">
					<input name="date" placeholder="Date of Birth" type="date" class="form-control input-lg">
				</div>
				<div class="form-group">
					<input name="user" placeholder="Username" type="text" class="form-control input-lg">
				</div>
				<div class="form-group">
					<input name="pass" placeholder="Password" type="password" class="form-control input-lg">
				</div>	
				<input type="hidden" name="datecreated" class="haha input-lg" <?php date_default_timezone_set("Asia/Manila"); $date = date('Y-m-d H:i:s'); echo "value = '$date'";?>>
				<input type="hidden" size="50"name="hid" value="member">
				<div class="form-group">
					<input name="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="SUBMIT">
				</div>	
			</form>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
		
