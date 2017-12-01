<?php
if (isset($_POST['num'])){
	$id = $_POST['num'];
}
unset($_POST['num']);
$userid = isset($_SESSION['mem_id'])?$_SESSION['mem_id']:'';
$id = $userid;
?>
<?php
if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
}
unset($_SESSION['msg']);
?>

<script>
	jQuery(document).ready(function(){
		// binds form submission and fields to the validation engine
		jQuery("#validation").validationEngine();
	});
</script>
						
<div class="container" style="margin-top:3%; ">
		
		<div class="row">
			
			<div class="col-md-12 ">
			
				<div style="border:thin solid #e5e5e5; padding:0px 8px 8px 8px;  border-radius: 20px; background-color:#ebebe4;">
					
					<div class="row " style="padding: 0 0.5em 0.5 em 0.5em;" align="center">
						<h2 class="bg-primary input-lg" style="width:99%; padding:15px 0px 5px 0px; border-top-left-radius: 20px; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; border-top-right-radius: 20px;margin-top:0px; background-color:#575ca9; ">Add User</h2>
					</div>
			<form  action="process/pro_edit.php" id="validation" name="myForm" method="post" enctype="multipart/form-data"> 
				<div class="form-inline form-group">
					<label>Last Name</label>
					<input type="text" name="lname" class="form-control input-lg" id="lname" style="margin-left:1%; margin-right:1%;" required>
					<label>First Name</label>
					<input type="text" id="fname" name="fname" class="form-control input-lg" style="margin-left:1%; margin-right:1%;" required>
					<label>Middle Name</label>
					<input type="text" name="mname" id="mname" class="form-control input-lg" style="margin-left:1%;" required>
				</div>
				
				<div class="form-inline form-group ">
					<label>Gender</label>
					
					<select class="form-control input-lg " style="margin-left:3%; margin-right:13.5%;"value="gender" required>
					
					<option value="">select</option><option>male</option><option>female</option>
					
					</select>
					
					<label>Status</label>
					<select class="form-control input-lg" style="margin-left:3.5%; margin-right:13%;" value="stat" required>
					<option value="">select</option><option>single</option><option>married</option>
					</select>
					<label>cooperative</label>
					<select class="form-control input-lg" style="margin-left:1.5%;" value="ncoop" required>
					<option value="">select</option><option>aaa</option><option>bbb</option><option>ccc</option>
					</select>
				</div>
				
				<div style="border:1px solid #575ca9;">
				</div>
				<br/>
				<div class="form-group col-xs-4" id="pic" style="float:right;">
				<img name="image" id="output" src="assets/images/<?=getMemberInfo($id,'mem_imagename')?>"  style="max-width: 160px; max-height: 120px; margin-right:90px;"/>
				<input type="file" id="image" name="image" accept="image/*" onchange="loadFile(event)"  name="image"/>
				</div>
				
				<div class="form-group">
					<span><label>Age:</label></span>
					<input type="text" name="age" class="form-control input-lg" style="width:65.50%;" placeholder="0"  required></label>
				</div>
				
				<div class="form-group">
					<span><label>Mobile Number:</label></span>
					<input type="text" name="number" class="validate[required,custom[number]] form-control input-lg" style="width:65.50%;" placeholder="0" required></label>
				</div>
				
				
					
				<div class="form-group">
					<span><label>Email Address:</label></span>
					<input type="text" class="validate[required,custom[email]] form-control input-lg"  style="width:65.50%; text-transform:none;"  name="eadd" id="email" required></label>
				</div>
				
				<div class="form-group">
					<span><label>Date of Birth:</label></span>
					<input type="date" name="dateofbirth" class="form-control input-lg" style="width:65.50%;" required></label>
				</div>
				
				<div class="form-group">
					<span><label>Home Address:</label></span>
					<input type="text" name="address1" class="form-control input-lg" style="width:65.50%;" required></label>
				</div>
				
				<div class="form-group">
					<span><label>Provincial Address:</label></span>
					<input type="text" name="address2" class="form-control input-lg" style="width:65.50%;" required></label>
				</div>
				<div class="form-group" >
					<label for="email">Username:</label>
					<input type="text" class="form-control input-sm" name="user" style="width:65.50%;" >
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" name="pass" style="width:65.50%;">
				</div>		
				<div class="form-group">
					<br/>
					<br/>
					<input type="submit" name="user" style="width:25%;" class="btn btn-primary btn-lg btn-block" value="Save">
				</div>
				<script>
					var loadFile = function(event) {
					var output = document.getElementById('output');
					output.src = URL.createObjectURL(event.target.files[0]);
										
					};
					
				</script>
			</form> 
			</div>
		</div> 
	</div>
 </div>

