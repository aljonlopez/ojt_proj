<?php
$userid = isset($_SESSION["mem_id"])?$_SESSION["mem_id"]:"";

$sql = mysqli_query($link, "SELECT * FROM tbl_member WHERE mem_id=$userid");
while($row=mysqli_fetch_array($sql)){
?>

<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h3 class="text-center">Information</h3>
		</div>
		<div class="modal-body">
			<form action="?con=editmember"  class="form col-md-12 center-block" method="post"> 
			
				<div class="form-group">
					<span><label>Name</label></span>
					<input type="text" disabled="true" class="haha input-lg"<?php $lname = $row['mem_lname']; $fname = $row['mem_fname']; $mname = $row['mem_mname']; echo "value='$fname $lname $mname'"; ?>>
					<input type="hidden" <?php echo "value='$userid'";?> name="num"> 
				</div>
				 
				<div class="form-group">
					<span><label>Gender</label></span>
					<input type="text" disabled="true" class="haha input-lg"<?php $gen = $row['mem_gender']; echo "value='$gen'"; ?>>
				</div>
				 
				<div class="form-group">
					<span><label>Status</label></span>
					<input type="text" disabled="true" class="haha input-lg"<?php $stat = $row['mem_status']; echo "value='$stat'"; ?>>
				</div>
				 
				<div class="form-group">
					<span><label>Cooperative</label></span>
					<input type="text" disabled="true" class="haha input-lg"<?php $ncoop = $row['mem_cooperative']; echo "value='$ncoop'"; ?>> 
				</div>
				 
				<div class="form-group">
					<span><label>Age</label></span>
					<input type="text" disabled="true" class="haha input-lg" <?php $age = $row['mem_age']; echo "value='$age'"; ?>> 
				</div>
				 
				<div class="form-group">	
					<span><label>Mobile Number</label></span>
					<input type="text" disabled="true" class="haha input-lg" <?php $mobnum = $row['mem_number']; echo "value='$mobnum'"; ?>> 
				</div>
				 
				<div class="form-group">
					<span><label>Email Address</label></span>
					<input type="text" disabled="true" class="haha input-lg" style="text-transform:none;"<?php $eadd = $row['mem_email']; echo "value='$eadd'"; ?>> 
				</div>
				 
				<div class="form-group">
					<span><label>Date of Birth</label></span>
					<input type="text" disabled="true" class="haha input-lg" <?php $dbirth = $row['mem_dateofbirth']; echo "value='$dbirth'"; ?>> 
				</div>
				 
				<div class="form-group">
					<span><label>Home Address</label></span>
					<input type="text" disabled="true" class="haha input-lg"<?php $hadd = $row['mem_homeaddress']; echo "value='$hadd'"; ?>> 
				</div>
					 
				<div class="form-group">
					<span><label>Provincial Address</label></span>
					<input type="text" disabled="true" class="haha input-lg"<?php $padd = $row['mem_provaddress']; echo "value='$padd'"; ?>>
				</div>
					
				<div class="form-group">
					<input type="submit" class="btn btn-primary btn-lg btn-block"name="submit" value="EDIT">
				</div>
		 
			</form> 	
		</div> 
	</div>
 </div>
<?php
}
?>